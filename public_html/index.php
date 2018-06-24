<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 11.01.18
 * Time: 16:10
 */

require_once(__DIR__ . "/../resources/models/Config.php");
require_once(__DIR__ . "/../resources/models/Info.php");
require_once(__DIR__ . "/../resources/models/InfoList.php");
require_once(__DIR__ . "/../resources/models/DBConnect.php");
require_once(__DIR__ . "/../resources/models/User.php");
require_once(__DIR__ . "/../resources/libs/smarty/Smarty.class.php");
$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ . "/../resources/smarty/templates");
$smarty->setCompileDir(__DIR__ . "/../resources/smarty/templates_c");
$smarty->setCacheDir(__DIR__ . "/../resources/smarty/cache");
$smarty->setConfigDir(__DIR__ . "/../resources/smarty/configs");

session_start();

if (isset($_SESSION["username"], $_SESSION["userId"])) {
    $smarty->assign("username", $_SESSION["username"]);
    $smarty->assign("userId", $_SESSION["userId"]);
}
$smarty->assign("configArr", Config::configArr);
checkCookieAgreement();

if (isset($_GET["p"])) {
    $smarty->assign("page", $_GET["p"]);
    assignInfos($smarty);
    switch ($_GET['p']) {
        case "login":
            $smarty->display('login.tpl');
            break;
        case "logging_in":
            require_once(__DIR__ . "/../resources/helpers/login.php");
            assignInfos($smarty);
            $smarty->display('login.tpl');
            break;
        case "register":
            require_once(__DIR__ . "/../resources/models/User.php");
            $smarty->display('register.tpl');
            break;
        case "registering":
            require_once(__DIR__ . "/../resources/helpers/register.php");
            assignInfos($smarty);
            $smarty->display('register.tpl');
            break;
        case "logout":
            require_once(__DIR__ . "/../resources/helpers/logout.php");
            break;
        case "song":
            require_once(__DIR__ . "/../resources/models/Song.php");
            require_once(__DIR__ . "/../resources/models/Artist.php");
            require_once(__DIR__ . "/../resources/models/User.php");
            require_once(__DIR__ . "/../resources/models/Cover.php");
            require_once(__DIR__ . "/../resources/models/Album.php");
            require_once(__DIR__ . "/../resources/models/Playlist.php");
            if (isset($_GET["id"])) {
                if (isset($_GET["do"])){
                    switch ($_GET["do"]) {
                        case "addToPlaylist":
                            DBConnect::insertPlaylistSong($_GET['id'], $_POST['playlist']);
                            break;
                    }
                }
                $song = new Song($_GET["id"]);
                $smarty->assign("song", $song);

                $artist = new Artist($song->getArtistId());
                $smarty->assign("artist", $artist);

                $user = new User($song->getUserId());
                $smarty->assign("user", $user);

                $cover = new Cover($song->getCoverId());
                $smarty->assign("cover", $cover);

                if ($song->getAlbumId() !== null) {
                    $album = new Album($song->getAlbumId());
                    $smarty->assign("album", $album);
                }

                if (isset($_SESSION["userId"])) {
                    $smarty->assign("playlists", DBConnect::getPlaylistsFromUser($_SESSION["userId"]));
                }

            }
            $smarty->display('song.tpl');
            if (isset($_SESSION["userId"])) {
                DBConnect::insertHistory($_SESSION["userId"], $song->getId());
            }
            break;
        case "album":
            require_once(__DIR__ . "/../resources/models/Album.php");
            require_once(__DIR__ . "/../resources/models/Artist.php");
            require_once(__DIR__ . "/../resources/models/Cover.php");
            require_once(__DIR__ . "/../resources/models/Song.php");
            if (isset($_GET["id"])) {
                $album = new Album($_GET["id"]);
                $artist = new Artist($album->getArtistId());
                $cover = new Cover($album->getCoverId());

                $songIds = $album->getSongIds();
                $songs = array();
                for ($i = 0; $i < count($songIds); $i++) {
                    $songs[] = new Song($songIds[$i]);
                }

                $smarty->assign("album", $album);
                $smarty->assign("artist", $artist);
                $smarty->assign("cover", $cover);
                $smarty->assign("songs", $songs);
            }
            $smarty->display('album.tpl');
            break;
        case "artist":
            require_once(__DIR__ . "/../resources/models/Artist.php");
            require_once(__DIR__ . "/../resources/models/Album.php");
            require_once(__DIR__ . "/../resources/models/Song.php");
            if (isset($_GET["id"])) {
                $artist = new Artist($_GET["id"]);
                $albums = array();
                $albumIds = DBConnect::getAlbumsFromArtist($artist->getId());
                for ($i = 0; $i < count($albumIds); $i++){
                    $albums[] = new Album($albumIds[$i]['id']);
                }
                $singles = array();
                $singleIds = DBConnect::getSinglesFromArtist($artist->getId());
                for ($i = 0; $i < count($singleIds); $i++){
                    $singles[] = new Song($singleIds[$i]);
                }
                $smarty->assign("artist", $artist);
                $smarty->assign("albums", $albums);
                $smarty->assign("singles", $singles);
            }
            $smarty->display('artist.tpl');
            break;
        case "user":
            require_once(__DIR__ . "/../resources/models/User.php");
            require_once(__DIR__ . "/../resources/models/Playlist.php");
            if (isset($_GET["id"])) {
                $user = new User($_GET["id"]);
                $smarty->assign("user", $user);

                $playlistIds = DBConnect::getPlaylistsFromUser($user->getId());
                $playlists = array();
                if ($playlistIds !== null) {
                    foreach ($playlistIds as $id => $value) {
                        $playlists[] = new Playlist($id);
                    }
                }
                $smarty->assign("playlists", $playlists);

            }
            $smarty->display('user.tpl');
            break;
        case "playlist":
            require_once(__DIR__ . "/../resources/models/Playlist.php");
            require_once(__DIR__ . "/../resources/models/User.php");
            require_once(__DIR__ . "/../resources/models/Artist.php");
            require_once(__DIR__ . "/../resources/models/Song.php");
            require_once(__DIR__ . "/../resources/models/Cover.php");
            if (isset($_GET["id"])) {
                $playlist = new Playlist($_GET["id"]);
                $user = new User($playlist->getUserId());

                $songIds = $playlist->getSongIds();
                $songs = array();
                for ($i = 0; $i < count($songIds); $i++) {
                    $songs[] = new Song($songIds[$i]);
                }
                $smarty->assign("playlist", $playlist);
                $smarty->assign("user", $user);
                $smarty->assign("songs", $songs);
            }
            $smarty->display('playlist.tpl');
            break;
        case "search":
            require_once(__DIR__ . "/../resources/models/Song.php");
            require_once(__DIR__ . "/../resources/models/Album.php");
            require_once(__DIR__ . "/../resources/models/Playlist.php");
            require_once(__DIR__ . "/../resources/models/Artist.php");
            require_once(__DIR__ . "/../resources/models/User.php");
            if (isset($_GET["do"])) {
                $searchString = filter_input(INPUT_POST, 'searchString', FILTER_SANITIZE_STRING);
                switch ($_GET["do"]) {
                    case "search":
                        if (!isset($_POST['searchType'])) {
                            $_POST['searchType'] = "all";
                        }
                        switch ($_POST['searchType']) {
                            case "all":
                                $songIds = DBConnect::searchForSongs($searchString);
                                $songs = array();
                                for ($i = 0; $i < count($songIds); $i++) {
                                    $songs[] = new Song($songIds[$i]);
                                }
                                $smarty->assign("songs", $songs);

                                $albumIds = DBConnect::searchForAlbums($searchString);
                                $albums = array();
                                for ($i = 0; $i < count($albumIds); $i++) {
                                    $albums[] = new Album($albumIds[$i]);
                                }
                                $smarty->assign("albums", $albums);

                                $playlistIds = DBConnect::searchForPlaylists($searchString);
                                $playlists = array();
                                for ($i = 0; $i < count($playlistIds); $i++) {
                                    $playlists[] = new Playlist($playlistIds[$i]);
                                }
                                $smarty->assign("playlists", $playlists);

                                $artistIds = DBConnect::searchForArtists($searchString);
                                $artists = array();
                                for ($i = 0; $i < count($artistIds); $i++) {
                                    $artists[] = new Artist($artistIds[$i]);
                                }
                                $smarty->assign("artists", $artists);

                                $userIds = DBConnect::searchForUsers($searchString);
                                $users = array();
                                for ($i = 0; $i < count($userIds); $i++) {
                                    $users[] = new User($userIds[$i]);
                                }
                                $smarty->assign("users", $users);

                                break;
                            case "song":
                                $songIds = DBConnect::searchForSongs($searchString);
                                $songs = array();
                                for ($i = 0; $i < count($songIds); $i++) {
                                    $songs[] = new Song($songIds[$i]);
                                }
                                $smarty->assign("songs", $songs);
                                break;
                            case "album":
                                $albumIds = DBConnect::searchForAlbums($searchString);
                                $albums = array();
                                for ($i = 0; $i < count($albumIds); $i++) {
                                    $albums[] = new Album($albumIds[$i]);
                                }
                                $smarty->assign("albums", $albums);
                                break;
                            case "playlist":
                                $playlistIds = DBConnect::searchForPlaylists($searchString);
                                $playlists = array();
                                for ($i = 0; $i < count($playlistIds); $i++) {
                                    $playlists[] = new Playlist($playlistIds[$i]);
                                }
                                $smarty->assign("playlists", $playlists);
                                break;
                            case "artist":
                                $artistIds = DBConnect::searchForArtists($searchString);
                                $artists = array();
                                for ($i = 0; $i < count($artistIds); $i++) {
                                    $artists[] = new Artist($artistIds[$i]);
                                }
                                $smarty->assign("artists", $artists);
                                break;
                            case "user":
                                $userIds = DBConnect::searchForUsers($searchString);
                                $users = array();
                                for ($i = 0; $i < count($userIds); $i++) {
                                    $users[] = new User($userIds[$i]);
                                }
                                $smarty->assign("users", $users);
                                break;
                        }
                        break;
                }
            }
            $smarty->display('search.tpl');
            break;
        case "add_song":
            if (isset($_GET["do"])) {
                switch ($_GET["do"]) {
                    case "upload":
                        require_once(__DIR__ . "/../resources/models/Song.php");
                        require_once(__DIR__ . "/../resources/libs/getid3/getid3.php");
                        if (isset($_SESSION["username"], $_SESSION["userId"])) {
                            if (isset($_POST["title"], $_POST["album"], $_POST["artist"], $_POST["genre"], $_POST["songtext"])) {
                                $songTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
                                $songAlbum = filter_input(INPUT_POST, 'album', FILTER_SANITIZE_STRING);
                                $songArtist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
                                $songGenre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
                                $songText = filter_input(INPUT_POST, 'songtext', FILTER_SANITIZE_STRING);
                                try {
                                    Song::createNewSong($songTitle, $songAlbum, $songArtist, $songGenre, $songText);
                                } catch (Exception $exception) {
                                    $exception->getMessage();
                                }
                            }
                        }
                        break;
                }
            }
            assignInfos($smarty);
            $smarty->assign("artists", DBConnect::getArtists());
            $smarty->assign("genres", DBConnect::getGenres());
            $smarty->display('add_song.tpl');
            break;
        case "add_album":
            if (isset($_GET["do"])) {
                switch ($_GET["do"]) {
                    case "create":
                        require_once(__DIR__ . "/../resources/models/Album.php");
                        if (isset($_SESSION["username"], $_SESSION["userId"])) {
                            if (isset($_POST["title"], $_POST["artist"])) {
                                $albumTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
                                $albumArtist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
                                try {
                                    Album::createNewAlbum($albumTitle, $albumArtist);
                                } catch (Exception $exception) {
                                    $exception->getMessage();
                                }
                            }
                        }
                        break;
                }
            }
            assignInfos($smarty);
            $smarty->assign("artists", DBConnect::getArtists());
            $smarty->display('add_album.tpl');
            break;
        case "add_playlist":
            if (isset($_GET["do"])) {
                switch ($_GET["do"]) {
                    case "create":
                        require_once(__DIR__ . "/../resources/models/Playlist.php");
                        if (isset($_SESSION["username"], $_SESSION["userId"])) {
                            if (isset($_POST["title"])) {
                                $playlistTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
                                try {
                                    Playlist::createNewPlaylist($playlistTitle, $_SESSION["userId"]);
                                } catch (Exception $exception) {
                                    $exception->getMessage();
                                }
                            }
                        }
                        break;
                }
            }
            assignInfos($smarty);
            $smarty->display('add_playlist.tpl');
            break;
        case "add_artist":
            if (isset($_GET["do"])) {
                switch ($_GET["do"]) {
                    case "create":
                        require_once(__DIR__ . "/../resources/models/Artist.php");
                        if (isset($_SESSION["username"], $_SESSION["userId"])) {
                            if (isset($_POST["name"])) {
                                $artistName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                                try {
                                    Artist::createNewArtist($artistName);
                                } catch (Exception $exception) {
                                    $exception->getMessage();
                                }
                            }
                        }
                        break;
                }
            }
            assignInfos($smarty);
            $smarty->display('add_artist.tpl');
            break;
        case "api_artists":
            require_once(__DIR__ . "/../resources/api/artists.php");
            break;
        case "api_albums":
            require_once(__DIR__ . "/../resources/api/albums.php");
            break;
        case "api_playlists":
            require_once(__DIR__ . "/../resources/api/playlists.php");
            break;
        case "api_genres":
            require_once(__DIR__ . "/../resources/api/genres.php");
            break;
        case "api_songs":
            require_once(__DIR__ . "/../resources/api/songs.php");
            break;
        default:
            $smarty->display('404.tpl');
    }
} else {
    require_once(__DIR__ . "/../resources/models/Album.php");
    require_once(__DIR__ . "/../resources/models/Song.php");
    require_once(__DIR__ . "/../resources/models/Playlist.php");
    $smarty->assign("page", "index");

    $albumIds = DBConnect::getAlbums();
    $albums = array();
    if ($albumIds !== null) {
        foreach ($albumIds as $id => $value) {
            $albums[] = new Album($id);
        }
        usort($albums, function($albumA, $albumB) {
            $albumADate = new DateTime($albumA->getCreated());
            $albumBDate = new DateTime($albumB->getCreated());
            if ($albumADate == $albumBDate) {
                return 0;
            }
            return $albumADate > $albumBDate ? -1 : 1;
        });
    }
    $smarty->assign("albums", $albums);


    $songIds = DBConnect::getSingles();
    $songs = array();
    if ($songIds !== null) {
        foreach ($songIds as $id => $value) {
            $songs[] = new Song($id);
        }
        usort($songs, function($songA, $songB) {
            $songADate = new DateTime($songA->getCreated());
            $songBDate = new DateTime($songB->getCreated());
            if ($songADate == $songBDate) {
                return 0;
            }
            return $songADate > $songBDate ? -1 : 1;
        });
    }
    $smarty->assign("songs", $songs);


    $playlistIds = DBConnect::getPlaylists();
    $playlists = array();
    if ($playlistIds !== null) {
        foreach ($playlistIds as $id => $value) {
            $playlists[] = new Playlist($id);
        }
        usort($playlists, function($playlistA, $playlistB) {
            $playlistADate = new DateTime($playlistA->getCreated());
            $playlistBDate = new DateTime($playlistB->getCreated());
            if ($playlistADate == $playlistBDate) {
                return 0;
            }
            return $playlistADate > $playlistBDate ? -1 : 1;
        });
    }
    $smarty->assign("playlists", $playlists);


    $popularSingleIdsVisits = DBConnect::getPopularSingles();
    $popularSingles = array();
    $i = 0;
    foreach ($popularSingleIdsVisits as $id => $value) {
        $popularSingles[$i] = new Song($id);
        $i++;
    }
    $smarty->assign("popularSingleIdsVisits", $popularSingleIdsVisits);
    $smarty->assign("popularSingles", $popularSingles);

    $popularAlbumIdsVisits = DBConnect::getPopularAlbums();
    $popularAlbums = array();
    $i = 0;
    foreach ($popularAlbumIdsVisits as $id => $avgVisits) {
        $popularAlbums[$i] = new Album($id);
        $i++;
    }
    $smarty->assign("popularAlbumIdsVisits", $popularAlbumIdsVisits);
    $smarty->assign("popularAlbums", $popularAlbums);

    assignInfos($smarty);
    $smarty->display('index.tpl');
}


function checkCookieAgreement() {
    if(!isset($_COOKIE["cookiesAccepted"]) || (isset($_COOKIE["cookiesAccepted"]) && $_COOKIE["cookiesAccepted"] != 1)) {
        InfoList::addInfo(new Info(Config::configArr["strings"]["cookieText"], Config::configArr["strings"]["cookieButton"], "","green")); // TODO: fix additional actions like setting the cookie
    }
}

function assignInfos($smarty) {
    $smarty->assign("infos", InfoList::getInfosArray());
}
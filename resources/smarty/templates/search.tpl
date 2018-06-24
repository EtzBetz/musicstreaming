{include file="header.tpl"}
<div class="content--set-column content--center-align">
    <div class="content--set-row content--center-align">
        <div class="card">
            <p class="text--title content--center-align">Suche</p>
            <form action="{$configArr.urls.search}&{$configArr.urls.do}search" method="post">
                <input type="radio" id="typeAll" name="searchType" title="searchType" value="all" checked/><label for="typeAll">Alles</label>
                <input type="radio" id="typeSong" name="searchType" title="searchType" value="song"/><label for="typeSong">Songs</label>
                <input type="radio" id="typeAlbum" name="searchType" title="searchType" value="album"/><label for="typeAlbum">Alben</label>
                <input type="radio" id="typePlaylist" name="searchType" title="searchType" value="playlist"/><label for="typePlaylist">Playlists</label>
                <input type="radio" id="typeArtist" name="searchType" title="searchType" value="artist"/><label for="typeArtist">Künstler</label>
                <input type="radio" id="typeUser" name="searchType" title="searchType" value="user"/><label for="typeUser">User</label>
                <br>
                <input type="text" name="searchString" title="searchString" required/>
                <button type="submit">Suchen</button>
            </form>
        </div>
    </div>
</div>
<div class="content--set-column content--center-align">
    {if isset($songs)}
    <div class="content--set-row content--center-align">
        <div class="card">
            <p class="text--title content--center-align">Gefundene Songs:</p>
            <div class="content--set-row">
            {foreach $songs as $song}
                <div class="card card--no-padding card--small">
                    <img class="song__cover" src="{$configArr["urls"]["coverDirectory"]}{$song->getCover()->getFilename()}"/>
                    <a href="{$configArr.urls.song}&{$configArr.urls.id}{$song->getId()}" class="content--center-align button--reset-uppercase">{$song->getName()}</a>
                </div>
            {/foreach}
            </div>
        </div>
    </div>
    {/if}
    {if isset($albums)}
    <div class="content--set-row content--center-align">
        <div class="card">
            <p class="text--title content--center-align">Gefundene Alben:</p>
            <div class="content--set-row">
                {foreach $albums as $album}
                    <div class="card card--no-padding card--small">
                        <img class="song__cover" src="{$configArr["urls"]["coverDirectory"]}{$album->getCover()->getFilename()}"/>
                        <a href="{$configArr.urls.album}&{$configArr.urls.id}{$album->getId()}" class="content--center-align button--reset-uppercase">{$album->getName()}</a>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
    {/if}
    {if isset($playlists)}
    <div class="content--set-row content--center-align">
        <div class="card">
            <p class="text--title content--center-align">Gefundene Playlists:</p>
            <div class="content--set-row">
                {foreach $playlists as $playlist}
                    <div class="card card--no-padding card--small">
                        <img class="song__cover" src="{$configArr["urls"]["coverDirectory"]}{$playlist->getSong(0)->getCover()->getFilename()}"/>
                        <a href="{$configArr.urls.playlist}&{$configArr.urls.id}{$playlist->getId()}" class="content--center-align button--reset-uppercase">{$playlist->getName()}</a>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
    {/if}
    {if isset($artists)}
    <div class="content--set-row content--center-align">
        <div class="card">
            <p class="text--title content--center-align">Gefundene Künstler:</p>
            <div class="content--set-column">
                {foreach $artists as $artist}
                    <p><a href="{$configArr.urls.artist}&{$configArr.urls.id}{$artist->getId()}" class="content--center-align button--reset-uppercase">{$artist->getName()}</a></p>
                {/foreach}
            </div>
        </div>
    </div>
    {/if}
    {if isset($users)}
    <div class="content--set-row content--center-align">
        <div class="card">
            <p class="text--title content--center-align">Gefundene User:</p>
            <div class="content--set-column">
                {foreach $users as $user}
                    <p><a href="{$configArr.urls.user}&{$configArr.urls.id}{$user->getId()}" class="content--center-align button--reset-uppercase">{$user->getUsername()}</a></p>
                {/foreach}
            </div>
        </div>
    </div>
    {/if}
</div>
{include file="footer.tpl"}
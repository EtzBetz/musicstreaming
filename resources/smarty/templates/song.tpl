{include file="header.tpl"}
<div class="column center spaceFull">
    <div class="row center">
        <div class="card">
            {if isset($song) && isset($artist) && isset($user)}
                <p class="title center">{$song->getName()}</p>
                <p class="title center">von <a class="title" href="{$configArr.urls.artist}&{$configArr.urls.id}{$artist->getId()}">{$artist->getName()}</a></p>
                <p class="title center">{$song->getVisits()} Aufrufe</p>
                <p class="title center">Am {$song->getCreated()} von <a class="title" href="{$configArr.urls.user}&{$configArr.urls.id}{$user->getId()}">{$user->getUsername()}</a> hochgeladen</p>
                <p class="title center">Genre: {$song->getGenreId()}</p>
                <p class="title center">Songtext: {$song->getSongtextId()}</p>
                <p class="title center">{$song->getCoverId()}</p>
                <p class="title center">{$song->getAlbumId()}</p>
            {else}
                <p class="title center">Interner Fehler.</p>
            {/if}
        </div>
    </div>
</div>
{include file="footer.tpl"}
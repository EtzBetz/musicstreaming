{include file="header.tpl"}
<div class="content--set-column content--center-align div--flex-full">
    <div class="content--set-row content--center-align">
        <div class="card">
            {if isset($song) && isset($artist) && isset($user)}
                <p class="text--title content--center-align">{$song->getName()}</p>
                <p class="text--title content--center-align">von <a class="text--title" href="{$configArr.urls.artist}&{$configArr.urls.id}{$artist->getId()}">{$artist->getName()}</a></p>
                <p class="text--title content--center-align">{$song->getVisits()} Aufrufe</p>
                <p class="text--title content--center-align">Am {$song->getCreated()} von <a class="text--title" href="{$configArr.urls.user}&{$configArr.urls.id}{$user->getId()}">{$user->getUsername()}</a> hochgeladen</p>
                <p class="text--title content--center-align">Genre: {$song->getGenre()}</p>
                <p class="text--title content--center-align">Songtext:</p>
                <p class="text--title content--center-align">{$song->getSongtext()}</p>
                <p class="text--title content--center-align">{$song->getCover()}</p>
                <p class="text--title content--center-align">{$song->getAlbumId()}</p>
            {else}
                <p class="text--title content--center-align">Interner Fehler.</p>
            {/if}
        </div>
    </div>
</div>
{include file="footer.tpl"}
{include file="header.tpl"}
<div class="content--set-column content--center-align">
    <div class="content--set-row content--center-align">
        <div class="card card--no-padding">
            {if isset($song) && isset($artist) && isset($user)}
                <div><img class="song__cover" src="{$configArr["urls"]["coverDirectory"]}{$song->getCoverFilename()}"/></div>
                <div><audio class="song__controls" src="{$configArr["urls"]["musicDirectory"]}{$song->getFilename()}" controls preload="auto"></audio></div>
                <p class="song__title-genre content--set-row content--left-align">
                    <span class="song__title text--title">{$song->getName()}</span>
                    <span class="song__genre content--left-align">{$song->getGenre()}</span>
                </p>
                <p class="song__artist-visits content--set-row content--left-align">
                    <span class="song__arist__prefix">von <a class="song__artist__name button--add-underline button--reset-uppercase" href="{$configArr.urls.artist}&{$configArr.urls.id}{$artist->getId()}">{$artist->getName()}</a></span>
                    <span class="song__visits content--left-align"><span class="song__visits__number">{$song->getVisits()}</span><span class="song__visits__suffix">{if $song->getVisits() == 1} Aufruf{else} Aufrufe{/if}</span>
                </p>
                <p class="song__date-uploader content--right-align">Am <span class="song__date">{$song->getCreated()}</span> von <a class="song__uploader button--add-underline button--reset-uppercase" href="{$configArr.urls.user}&{$configArr.urls.id}{$user->getId()}">{$user->getUsername()}</a> hochgeladen</p>
                <p class="song__songtext-button content--center-align svg-icon svg-baseline icon--chevron_down--dark" id="song__songtext-button" onclick="toggleSongtext()">Songtext anzeigen</p>
                <p class="song__songtext content--center-align">{$song->getSongtext()}</p>
                <p class="content--left-align">{$song->getAlbumId()}</p>
            {else}
                <p class="text--title content--center-align">Interner Fehler.</p>
            {/if}
        </div>
    </div>
</div>
{include file="footer.tpl"}
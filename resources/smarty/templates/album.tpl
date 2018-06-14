{include file="header.tpl"}
<div class="content--set-column content--center-align div--flex-full">
    <div class="content--set-row content--center-align">
        <div class="card">
            {if isset($album) && isset($artist) && isset($cover) && isset($songs)}
                <div><img class="song__cover" src="{$configArr["urls"]["coverDirectory"]}{$cover->getFilename()}"/></div>
                <div><p class="text--title content--center-align">{$album->getName()}</p></div>
                <div>von <a href="{$configArr.urls.artist}&{$configArr.urls.id}{$artist->getId()}" class="text--title content--center-align">{$artist->getName()}</a></div>
                {foreach $songs as $song}
                    <div>{$song@index+1}. <a href="{$configArr.urls.song}&{$configArr.urls.id}{$song->getId()}" class="content--center-align">{$song->getName()}</a></div>
                {/foreach}
            {else}
                <p class="text--title content--center-align">Interner Fehler.</p>
            {/if}
        </div>
    </div>
</div>
{include file="footer.tpl"}
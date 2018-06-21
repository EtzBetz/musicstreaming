{include file="header.tpl"}
{if isset($artist)}
<div class="content--set-column content--center-align">
    <div class="content--set-row content--center-align">
        <div class="card">
                <p class="text--title content--center-align">{$artist->getName()}</p>
        </div>
    </div>
</div>
<div class="content--set-row content--center-align">
    <div class="card">
        <p class="text--title content--center-align">Singles</p>
        <div>
            {foreach $singles as $song}
                <p><a href="{$configArr.urls.song}&{$configArr.urls.id}{$song->getId()}">{$song->getName()}</a></p>
            {/foreach}
        </div>
    </div>
    <div class="card">
        <p class="text--title content--center-align">Alben</p>
        <div>
            {foreach $albums as $album}
                <p><a href="{$configArr.urls.album}&{$configArr.urls.id}{$album->getId()}">{$album->getName()}</a></p>
            {/foreach}
        </div>
    </div>
</div>
{else}
    <p class="text--title content--center-align">Interner Fehler.</p>
{/if}
{include file="footer.tpl"}
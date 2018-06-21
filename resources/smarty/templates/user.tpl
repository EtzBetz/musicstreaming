{include file="header.tpl"}
{if isset($user)}
<div class="content--set-column content--center-align">
    <div class="content--set-row content--center-align">
        <div class="card">
                <p class="text--title content--center-align">{$user->getUsername()}</p>
                <p class="content--left-align">Am {$user->getCreated()} der Seite beigetreten.</p>
        </div>
    </div>
</div>
<div class="content--set-row content--center-align">
    <div class="card">
        <p class="text--title content--center-align">Playlists</p>
        <div>
            {foreach $playlists as $playlist}
                <p><a href="{$configArr.urls.playlist}&{$configArr.urls.id}{$playlist->getId()}">{$playlist->getName()}</a></p>
            {/foreach}
        </div>
    </div>
</div>
{else}
    <p class="text--title content--center-align">Interner Fehler.</p>
{/if}
{include file="footer.tpl"}
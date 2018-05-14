{include file="header.tpl"}
<div class="content--set-column content--center-align div--flex-full">
    <div class="content--set-row content--center-align">
        <div class="card">
            {if isset($user)}
                <p class="text--title content--center-align">{$user->getUsername()}</p>
                <p class="text--title content--center-align">Am {$user->getCreated()} der Seite beigetreten.</p>
                {* TODO: add uploaded songs, created albums and playlists of user *}
            {else}
                <p class="text--title content--center-align">Interner Fehler.</p>
            {/if}
        </div>
    </div>
</div>
{include file="footer.tpl"}
{include file="header.tpl"}
<div class="column center spaceFull">
    <div class="row center">
        <div class="card">
            {if isset($user)}
                <p class="title center">{$user->getUsername()}</p>
                <p class="title center">Am {$user->getCreated()} der Seite beigetreten.</p>
                {* TODO: add uploaded songs, created albums and playlists of user *}
            {else}
                <p class="title center">Interner Fehler.</p>
            {/if}
        </div>
    </div>
</div>
{include file="footer.tpl"}
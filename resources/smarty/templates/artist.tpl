{include file="header.tpl"}
<div class="column center spaceFull">
    <div class="row center">
        <div class="card">
            {if isset($artist)}
                <p class="title center">{$artist->getName()}</p>
                {* TODO: add songs, albums (and playlists?) of artist *}
            {else}
                <p class="title center">Interner Fehler.</p>
            {/if}
        </div>
    </div>
</div>
{include file="footer.tpl"}
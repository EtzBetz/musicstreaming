{include file="header.tpl"}
<div class="content--set-column content--center-align div--flex-full">
    <div class="content--set-row content--center-align">
        <div class="card">
            {if isset($artist)}
                <p class="text--title content--center-align">{$artist->getName()}</p>
                {* TODO: add songs, albums (and playlists?) of artist *}
            {else}
                <p class="text--title content--center-align">Interner Fehler.</p>
            {/if}
        </div>
    </div>
</div>
{include file="footer.tpl"}
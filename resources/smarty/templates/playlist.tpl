{include file="header.tpl"}
<div class="content--set-column content--center-align div--flex-full">
    <div class="content--set-row content--center-align">
        <div class="card">
            {if isset($playlist) && isset($user) && isset($songs)}
                <div><p class="text--title content--center-align">{$playlist->getName()}</p></div>
                <div>von <a href="{$configArr.urls.user}&{$configArr.urls.id}{$user->getId()}" class="text--title content--center-align">{$user->getUsername()}</a></div>
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
{if isset($infos)}
{foreach $infos as $info}
    {strip}
        <div class="info {$info.color}">
            <span>{$info.mainText}</span>
            {if isset($info.btnText) && $info.btnText != ""}
                <a onclick="hideInfo(this.parentNode)">{$info.btnText}</a>
            {/if}
        </div>
    {/strip}
{/foreach}
{/if}
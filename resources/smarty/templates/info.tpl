{if isset($infos)}
    {foreach $infos as $info}
        {strip}
            <div class="info__card {if isset($info.color) && $info.color != ""}info__card--{$info.color}{/if}">
                <div class="info__card__wrapper">
                <span class="info__card__wrapper__text">{$info.mainText}</span>
                {if isset($info.btnText) && $info.btnText != ""}
                    <a class="info__card__wrapper__button" {if ($info.btnLink !== "")}href="{$info.btnLink}"{/if}onclick="hideInfo(this.parentNode.parentNode)">{$info.btnText}</a>
                {/if}
                </div>
            </div>
        {/strip}
    {/foreach}
{/if}
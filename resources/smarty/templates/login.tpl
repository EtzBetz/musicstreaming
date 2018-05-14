{include file="header.tpl"}
<div class="content--set-column content--center-align div--flex-full">
    <div class="content--set-row content--center-align">
        <div class="card">
            {if isset($username, $userId)}
                <p class="text--title content--center-align">{$configArr.strings.alreadyLoggedIn}</p>
                <a class="text--title content--center-align" href="{$configArr.urls.logout}">{$configArr.strings.canLogoutHere}</a>
            {else}
                <form action="{$configArr.urls.logging_in}" method="post" class="content--set-column">
                    <p class="text--title content--center-align">{$configArr.strings.login}</p>
                    <div class="card__column content--set-column">
                        <input class="card__input" placeholder="{$configArr.strings.email}" type="email" alt="{$configArr.strings.email}" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{ldelim}2,4{rdelim}$" required>
                        <span class="card__input__warning">{$configArr.strings.enterValidEmail}</span> {* TODO: change header info div css to div.info and change this to class="info" *}
                    </div>
                    <div class="card__column content--set-column">
                        <input class="card__input" placeholder="{$configArr.strings.password}" type="password" alt="{$configArr.strings.password}" id="password" name="password" minlength="6" required>
                        <span class="card__input__warning">{$configArr.strings.passwordHint}</span>
                    </div>
                    <div class="content--set-column">
                        <button class="card__button--submit" type="submit">{$configArr.strings.login}</button>
                    </div>
                </form>
            {/if}
        </div>
    </div>
    {*<div class="columnSpace150"></div>*}
</div>
{include file="footer.tpl"}
{include file="header.tpl"}
<div class="content--set-column content--center-align div--flex-full">
    <div class="content--set-row content--center-align">
        <div class="card">
            {if isset($username, $userId)}
                <p class="text--title content--center-align">{$configArr.strings.alreadyRegistered}</p>
            {else}
                <form action="{$configArr.urls.registering}" onsubmit="return validateForm()" method="post" class="content--set-column">
                    <p class="text--title content--center-align">{$configArr.strings.register}</p>
                    <div class="card__column content--set-column">
                        <input class="card__input" placeholder="{$configArr.strings.email}" type="email" alt="E-Mail" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{ldelim}2,4{rdelim}$" required>
                        <span class="card__input__warning">{$configArr.strings.enterValidEmail}</span> {* TODO: change header info div css to div.info and change this to class="info" *}
                    </div>
                    <div class="card__column content--set-column">
                        <input class="card__input" placeholder="{$configArr.strings.username}" alt="Username" id="username" name="username" pattern="[a-zA-Z0-9]{ldelim}3,20{rdelim}" required>
                        <span class="card__input__warning">{$configArr.strings.enterValidAccountname}</span>
                    </div>
                    <div class="card__column content--set-column">
                        <input class="card__input" placeholder="{$configArr.strings.password}" type="password" alt="Password" id="password" name="password" minlength="6" required>
                        <span class="card__input__warning">{$configArr.strings.passwordHint}</span>
                    </div>
                    <div class="card__column content--set-column">
                        <input class="card__input" placeholder="{$configArr.strings.repeatPassword}" type="password" alt="Repeat Password" id="passwordRepeat" name="passwordRepeat" minlength="6" required>
                        <span class="card__input__warning">{$configArr.strings.passwordHint}</span>
                        <span class="card__input__warning">{$configArr.strings.passwordNotMatching}</span>
                    </div>
                    <div>
                        <button class="card__button--submit" type="submit">{$configArr.strings.register}</button>
                    </div>
                </form>
            {/if}
        </div>
    </div>
</div>
{include file="footer.tpl"}
{include file="header.tpl"}
<div class="column center spaceFull">
    <div class="row center">
        <div class="card">
            {if isset($username, $userId)}
                <p class="title center">{$configArr.strings.alreadyLoggedIn}</p>
                <a class="title center" href="{$configArr.urls.logout}">{$configArr.strings.canLogoutHere}</a>
            {else}
                <form action="{$configArr.urls.logging_in}" method="post" class="column">
                    <p class="title center">Sign In</p>
                    <div class="columnSpace10"></div>
                    <div class="column">
                        <input class="register" placeholder="E-Mail" type="email" alt="E-Mail" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{ldelim}2,4{rdelim}$" required>
                        <span class="warning">{$configArr.strings.enterValidEmail}</span> {* TODO: change header info div css to div.info and change this to class="info" *}
                    </div>
                    <div class="column">
                        <input placeholder="Password" type="password" alt="Password" id="password" name="password" minlength="6" required>
                        <span class="warning">{$configArr.strings.passwordHint}</span>
                    </div>
                    <div class="column">
                        <button type="submit">Login</button>
                    </div>
                </form>
            {/if}
        </div>
    </div>
    {*<div class="columnSpace150"></div>*}
</div>
{include file="footer.tpl"}
{include file="header.tpl"}
<div class="column center spaceFull">
    <div class="row center">
        <div class="card">
            {if isset($username, $userId)}
                <p class="title center">{$configArr.strings.alreadyRegistered}</p>
            {else}
                <form action="{$configArr.urls.registering}" onsubmit="return validateForm()" method="post" class="column">
                    <p class="title center">{$configArr.strings.register}</p>
                    <div class="columnSpace10"></div>
                    <div class="column">
                        {*<label for="email" class="">E-Mail:</label>*}
                        <input class="register" placeholder="E-Mail" type="email" alt="E-Mail" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{ldelim}2,4{rdelim}$" required>
                        <span class="warning">{$configArr.strings.enterValidEmail}</span> {* TODO: change header info div css to div.info and change this to class="info" *}
                    </div>
                    <div class="column">
                        {*<label for="username" class="">Username:</label>*}
                        <input class="register" placeholder="Username" alt="Username" id="username" name="username" pattern="[a-zA-Z0-9]{ldelim}3,20{rdelim}" required>
                        <span class="warning">{$configArr.strings.enterValidAccountname}</span>
                    </div>
                    <div class="column">
                        {*<label for="password" class="">Password:</label>*}
                        <input class="register" placeholder="Password" type="password" alt="Password" id="password" name="password" minlength="6" required>
                        <span class="warning">{$configArr.strings.passwordHint}</span>
                    </div>
                    <div class="column">
                        {*<label for="passwordRepeat" class="">Repeat Password:</label>*}
                        <input class="register" placeholder="Repeat Password" type="password" alt="Repeat Password" id="passwordRepeat" name="passwordRepeat" minlength="6" required>
                        <span class="warning">{$configArr.strings.passwordHint}</span>
                        <span class="warning">{$configArr.strings.passwordNotMatching}</span>
                    </div>
                    <div>
                        <button class="register" type="submit">Register</button>
                    </div>
                </form>
            {/if}
        </div>
    </div>
    <!--<div class="columnSpace150"></div>-->
</div>
{include file="footer.tpl"}
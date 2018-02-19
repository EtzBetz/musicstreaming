{include file="header.tpl"}
<div class="column center spaceFull">
    <div class="row center">
        <div class="card">
            <form action="" method="post" class="column">
            <p class="title center">{$configArr.strings.groupName}'s Raidplaner</p>
                <input placeholder="Username or E-Mail" alt="Username or E-Mail" id="username" required>
                <input placeholder="Password" type="password" alt="Password" id="password" required>
                <input type="button" value="Login">
            </form>
        </div>
    </div>
</div>
{include file="footer.tpl"}
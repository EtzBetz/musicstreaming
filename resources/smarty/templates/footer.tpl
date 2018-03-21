        </div>
        <footer class="">
            <div class="main">
                <div>
                    <span class="madeWithLove">{$configArr.strings.madeWithLove1}<span class="heart">♥</span>{$configArr.strings.madeWithLove2}</span>
                    <a class="footer light" href="{$configArr.urls.githubProject}">{$configArr.strings.github}</a>
                </div>
            </div>
        </footer>
        </div>
    </body>
    <script src='./js/javascript.js'></script>
    {if $page == "register"}
        <script src='./js/register.js'></script>
    {/if}
</html>
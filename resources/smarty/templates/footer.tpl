        </div>
        <footer class="">
            <div class="footer__main">
                <div>
                    <span class="footer__made-with-love">{$configArr.strings.madeWithLove1}<span class="footer__made-with-love__heart">♥</span>{$configArr.strings.madeWithLove2}</span>
                    <a class="footer__button button--color-light button--bgcolor-light button--weight-normal svg-icon svg-baseline icon--github_circle--light" href="{$configArr.urls.githubProject}">{$configArr.strings.github}</a>
                </div>
            </div>
        </footer>
        </div>
    </body>
    <script src='./js/javascript.js'></script>
    {if $page == "register"}
        <script src='./js/register.js'></script>
    {elseif $page == "add_song"}
        <script src='./js/add_song.js'></script>
    {/if}
</html>
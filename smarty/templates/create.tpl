<header id="header">
    <h1>One Time Password Access</h1>
    {if $uuid}
        The URL to the created password is:<br />
        <a href="/access/{$uuid}">{$uuid}</a>
    {/if}
    <form method="post" action="">
        <input type="text" name="token" value="">
        <input type="submit" name="submit" value="Save it!">
    </form>
    </p>
</header>
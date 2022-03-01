{if $valid}
    <header id="header">
        <h1>One Time Password Access</h1>
        <p>You can only view this password once<br />
        <form method="post" action="">
            <input type="hidden" name="uuid" value="{$uuid}">
            <input type="submit" name="submit" value="Request it!">
        </form>
        </p>
    </header>
{elseif $usedtime>0}
    <header id="header">
        <h1>One Time Password Access</h1>
        <p>You can only view this password once<br />
            It was viewed at {$usedtime|date_format:"%d.%m.%Y %H:%M:%S"}
        </p>
    </header>
{else}
    <header id="header">
        <h1>One Time Password Access</h1>
        <p>This password does not exists</p>
    </header>
{/if}
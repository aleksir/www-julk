<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <% stylesheet:tyyli %>
        <title><% TITLE %></title>
    </head>
    <body id="<% PAGE_ID %>">
        <div id="header">
            <% HEADER %>
            <div class="navbar" >
                <ul>
                <% foreach ( links as name => url %>
                    <li>
                        <a href="<% url %>" class="navlink"><% name %></a>
                    </li>
                <% end %>
                </ul>
            </div>
        </div>
        <div class="wrapper">
            <p><?= $_SERVER['REQUEST_URI'] ?></p>
            <p><?= $_GET['site'] ?></p>
            <div id="content">
                <% yield %>
            </div>
        </div>
        <div id="footer">
            <?= $footer ?>
        </div>
    </body>
</html>

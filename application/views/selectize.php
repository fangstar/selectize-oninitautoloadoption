<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sselectize Tests</title>

    <style type="text/css">

    ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        background-color: #fff;
        margin: 40px;
        font: 16px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 24px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 16px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body {
        margin: 0 15px 0 15px;
    }

    p.footer {
        text-align: right;
        font-size: 16px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/selectize.min.js"></script> -->
</head>
<body>

<div id="container">
    <div id="wrapper">
        <h1>Selectize Tests</h1>
            <div class="demo">
                <h2>Loading from API</h2>
                <p>This demo shows how to integrate third-party data, loaded asynchronously.</p>
                <div class="control-group">
                    <label for="select-movie">Part Number:</label>
                    <select id="select-movie" class="movies" placeholder="Find a ..." multiple></select>
                </div>
            </div>
    </div>
</div>

                <script>
                // <select id="select-movie"></select>
                $('#select-movie').selectize({
                    valueField: 'part_number',
                    labelField: 'part_number',
                    searchField: 'part_number',
                    options: [],
                    create: false,
                    // render: {
                    //     option: function(item, escape) {
                    //         var actors = [];
                    //         for (var i = 0, n = item.abridged_cast.length; i < n; i++) {
                    //             actors.push('<span>' + escape(item.abridged_cast[i].name) + '</span>');
                    //         }
                    //         return '<div>' +
                    //             '<img src="' + escape(item.posters.thumbnail) + '" alt="">' +
                    //             '<span class="title">' +
                    //                 '<span class="name">' + escape(item.title) + '</span>' +
                    //             '</span>' +
                    //             '<span class="description">' + escape(item.synopsis || 'No synopsis available at this time.') + '</span>' +
                    //             '<span class="actors">' + (actors.length ? 'Starring ' + actors.join(', ') : 'Actors unavailable') + '</span>' +
                    //         '</div>';
                    //     }
                    // },
                    preload: true,
                    // load: function(query, callback) {
                    //     if (!query.length) return callback();
                    //     $.ajax({
                    //         url: './api/models/part_numbers',
                    //         type: 'GET',
                    //         dataType: 'jsonp',
                    //         data: {
                    //             q: query,
                    //             page_limit: 10
                    //         //     apikey: '3qqmdwbuswut94jv4eua3j85'
                    //         },
                    //         error: function() {
                    //             callback();
                    //         },
                    //         success: function(res) {
                    //             console.log(res);
                    //             // callback(res.movies);
                    //         }
                    //     });
                    // },
                    onInitialize: function() {
                        var self = this;
                        $.ajax({
                            url: './api/models/part_numbers',
                            type: 'GET',
                            dataType: 'jsonp',
                            error: function() {
                                callback();
                            },
                            success: function(res) {
                                console.log(res);
                                self.addOption(res);
                                // callback(res.movies);
                            }
                        });
                    }
                });
                </script>
</body>
</html>
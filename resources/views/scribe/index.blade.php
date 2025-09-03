<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-generate-dummy-porto">
                                <a href="#endpoints-GETapi-generate-dummy-porto">GET api/generate-dummy-porto</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-about-teams">
                                <a href="#endpoints-GETapi-about-teams">GET api/about/teams</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-career">
                                <a href="#endpoints-GETapi-career">GET api/career</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-career--id-">
                                <a href="#endpoints-GETapi-career--id-">GET api/career/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-category">
                                <a href="#endpoints-GETapi-category">GET api/category</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-about-clients">
                                <a href="#endpoints-GETapi-about-clients">GET api/about/clients</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-profile-setting">
                                <a href="#endpoints-GETapi-profile-setting">GET api/profile-setting</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-contact">
                                <a href="#endpoints-GETapi-contact">GET api/contact</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-gallery">
                                <a href="#endpoints-GETapi-gallery">GET api/gallery</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-job">
                                <a href="#endpoints-GETapi-job">GET api/job</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-about-main">
                                <a href="#endpoints-GETapi-about-main">GET api/about/main</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-messages">
                                <a href="#endpoints-GETapi-messages">GET api/messages</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-news">
                                <a href="#endpoints-GETapi-news">GET api/news</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-news--id-">
                                <a href="#endpoints-GETapi-news--id-">GET api/news/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-portofolio">
                                <a href="#endpoints-GETapi-portofolio">GET api/portofolio</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-portofolio--id-">
                                <a href="#endpoints-GETapi-portofolio--id-">GET api/portofolio/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-profile">
                                <a href="#endpoints-GETapi-profile">GET api/profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-review">
                                <a href="#endpoints-GETapi-review">GET api/review</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-service">
                                <a href="#endpoints-GETapi-service">GET api/service</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-value">
                                <a href="#endpoints-GETapi-value">GET api/value</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-vision">
                                <a href="#endpoints-GETapi-vision">GET api/vision</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: July 4, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-generate-dummy-porto">GET api/generate-dummy-porto</h2>

<p>
</p>



<span id="example-requests-GETapi-generate-dummy-porto">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/generate-dummy-porto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/generate-dummy-porto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-generate-dummy-porto">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;Dummy image berhasil dibuat.&quot;,
    &quot;dummy_created&quot;: 0
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-generate-dummy-porto" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-generate-dummy-porto"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-generate-dummy-porto"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-generate-dummy-porto" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-generate-dummy-porto">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-generate-dummy-porto" data-method="GET"
      data-path="api/generate-dummy-porto"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-generate-dummy-porto', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-generate-dummy-porto"
                    onclick="tryItOut('GETapi-generate-dummy-porto');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-generate-dummy-porto"
                    onclick="cancelTryOut('GETapi-generate-dummy-porto');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-generate-dummy-porto"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/generate-dummy-porto</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-generate-dummy-porto"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-generate-dummy-porto"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-about-teams">GET api/about/teams</h2>

<p>
</p>



<span id="example-requests-GETapi-about-teams">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/about/teams" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/about/teams"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-about-teams">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;foto_orang&quot;: &quot;dpHwl2MDoemkrzQr8Rz9EHr52loxwkcNdws93io0.jpg&quot;,
            &quot;nama_orang&quot;: &quot;Reifan Azkiaa&quot;,
            &quot;jabatan&quot;: &quot;PKL&quot;,
            &quot;link_ig&quot;: &quot;reifanzzkk_&quot;,
            &quot;link_in&quot;: &quot;-&quot;,
            &quot;link_fb&quot;: &quot;-&quot;,
            &quot;link_twt&quot;: null,
            &quot;created_at&quot;: &quot;2025-06-26T03:55:32.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-26T04:05:54.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-about-teams" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-about-teams"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-about-teams"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-about-teams" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-about-teams">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-about-teams" data-method="GET"
      data-path="api/about/teams"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-about-teams', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-about-teams"
                    onclick="tryItOut('GETapi-about-teams');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-about-teams"
                    onclick="cancelTryOut('GETapi-about-teams');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-about-teams"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/about/teams</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-about-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-about-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-career">GET api/career</h2>

<p>
</p>



<span id="example-requests-GETapi-career">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/career" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/career"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-career">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 12,
            &quot;lowong_krj&quot;: &quot;Frontend Developer&quot;,
            &quot;ket_lowong&quot;: {
                &quot;ringkasan&quot;: &quot;Sebagai Frontend Developer, Anda akan bertanggung jawab dalam merancang dan mengembangkan antarmuka pengguna yang interaktif dan responsif menggunakan framework modern seperti Vue.js. Anda akan bekerja sama secara erat dengan tim desain dan backend untuk memastikan integrasi dan performa aplikasi berjalan dengan baik. Peran ini membutuhkan perhatian terhadap detail, semangat kolaborasi, serta kemampuan menulis kode yang bersih dan terstruktur.&quot;,
                &quot;klasifikasi&quot;: [
                    &quot;Web Developer&quot;
                ],
                &quot;deskripsi&quot;: [
                    &quot;Membuka website menggunakan Vue JS. Berkolaborasi dengan tim desain. Minimal API Integration.&quot;,
                    &quot;membuat bos senang&quot;
                ],
                &quot;skillsets&quot;: [
                    &quot;Vue.js, Tailwind CSS, API Integration&quot;
                ],
                &quot;pengalaman&quot;: &quot;1-3 tahun&quot;,
                &quot;jam_kerja&quot;: &quot;08.00 - 16.00 WIB&quot;,
                &quot;hari_kerja&quot;: &quot;Senin-Sabtu&quot;,
                &quot;lokasi&quot;: &quot;Cigugur Tengah&quot;
            },
            &quot;created_at&quot;: &quot;2025-04-23T03:47:03.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-25T04:52:29.000000Z&quot;,
            &quot;tipe&quot;: &quot;Full Time&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-career" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-career"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-career"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-career" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-career">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-career" data-method="GET"
      data-path="api/career"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-career', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-career"
                    onclick="tryItOut('GETapi-career');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-career"
                    onclick="cancelTryOut('GETapi-career');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-career"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/career</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-career"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-career"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-career--id-">GET api/career/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-career--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/career/12" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/career/12"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-career--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 12,
        &quot;lowong_krj&quot;: &quot;Frontend Developer&quot;,
        &quot;ket_lowong&quot;: {
            &quot;ringkasan&quot;: &quot;Sebagai Frontend Developer, Anda akan bertanggung jawab dalam merancang dan mengembangkan antarmuka pengguna yang interaktif dan responsif menggunakan framework modern seperti Vue.js. Anda akan bekerja sama secara erat dengan tim desain dan backend untuk memastikan integrasi dan performa aplikasi berjalan dengan baik. Peran ini membutuhkan perhatian terhadap detail, semangat kolaborasi, serta kemampuan menulis kode yang bersih dan terstruktur.&quot;,
            &quot;klasifikasi&quot;: [
                &quot;Web Developer&quot;
            ],
            &quot;deskripsi&quot;: [
                &quot;Membuka website menggunakan Vue JS. Berkolaborasi dengan tim desain. Minimal API Integration.&quot;,
                &quot;membuat bos senang&quot;
            ],
            &quot;skillsets&quot;: [
                &quot;Vue.js, Tailwind CSS, API Integration&quot;
            ],
            &quot;pengalaman&quot;: &quot;1-3 tahun&quot;,
            &quot;jam_kerja&quot;: &quot;08.00 - 16.00 WIB&quot;,
            &quot;hari_kerja&quot;: &quot;Senin-Sabtu&quot;,
            &quot;lokasi&quot;: &quot;Cigugur Tengah&quot;
        },
        &quot;created_at&quot;: &quot;2025-04-23T03:47:03.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-25T04:52:29.000000Z&quot;,
        &quot;tipe&quot;: &quot;Full Time&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-career--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-career--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-career--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-career--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-career--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-career--id-" data-method="GET"
      data-path="api/career/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-career--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-career--id-"
                    onclick="tryItOut('GETapi-career--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-career--id-"
                    onclick="cancelTryOut('GETapi-career--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-career--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/career/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-career--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-career--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-career--id-"
               value="12"
               data-component="url">
    <br>
<p>The ID of the career. Example: <code>12</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-category">GET api/category</h2>

<p>
</p>



<span id="example-requests-GETapi-category">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/category" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/category"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-category">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;category_id&quot;: 1,
            &quot;nama_category&quot;: &quot;Pendidikan&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null
        },
        {
            &quot;category_id&quot;: 2,
            &quot;nama_category&quot;: &quot;politik&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null
        },
        {
            &quot;category_id&quot;: 3,
            &quot;nama_category&quot;: &quot;Digital Marketing&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null
        },
        {
            &quot;category_id&quot;: 4,
            &quot;nama_category&quot;: &quot;Web Development&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null
        },
        {
            &quot;category_id&quot;: 5,
            &quot;nama_category&quot;: &quot;speaker&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-category" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-category"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-category"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-category" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-category">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-category" data-method="GET"
      data-path="api/category"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-category', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-category"
                    onclick="tryItOut('GETapi-category');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-category"
                    onclick="cancelTryOut('GETapi-category');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-category"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/category</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-category"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-category"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-about-clients">GET api/about/clients</h2>

<p>
</p>



<span id="example-requests-GETapi-about-clients">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/about/clients" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/about/clients"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-about-clients">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 10,
            &quot;foto_client&quot;: &quot;Frame 1597883479.png&quot;,
            &quot;created_at&quot;: &quot;2025-01-17T14:37:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-25T07:21:54.000000Z&quot;,
            &quot;name&quot;: &quot;LIPI&quot;,
            &quot;status&quot;: 1
        },
        {
            &quot;id&quot;: 12,
            &quot;foto_client&quot;: &quot;Frame 1597883494.png&quot;,
            &quot;created_at&quot;: &quot;2025-01-17T14:43:34.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-17T14:43:34.000000Z&quot;,
            &quot;name&quot;: &quot;BMTI&quot;,
            &quot;status&quot;: 1
        },
        {
            &quot;id&quot;: 15,
            &quot;foto_client&quot;: &quot;Frame 1597883475.png&quot;,
            &quot;created_at&quot;: &quot;2025-01-17T14:46:46.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-17T14:46:46.000000Z&quot;,
            &quot;name&quot;: &quot;Yayasan KEP&quot;,
            &quot;status&quot;: 1
        },
        {
            &quot;id&quot;: 16,
            &quot;foto_client&quot;: &quot;Frame 1597883481.png&quot;,
            &quot;created_at&quot;: &quot;2025-01-17T14:47:24.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-17T14:47:24.000000Z&quot;,
            &quot;name&quot;: &quot;Tut Wuri Handayani&quot;,
            &quot;status&quot;: 1
        },
        {
            &quot;id&quot;: 22,
            &quot;foto_client&quot;: &quot;image65.webp&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:49:29.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:49:29.000000Z&quot;,
            &quot;name&quot;: &quot;smk pertiwi&quot;,
            &quot;status&quot;: 2
        },
        {
            &quot;id&quot;: 23,
            &quot;foto_client&quot;: &quot;image70.webp&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:49:52.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:49:52.000000Z&quot;,
            &quot;name&quot;: &quot;sandikta&quot;,
            &quot;status&quot;: 2
        },
        {
            &quot;id&quot;: 24,
            &quot;foto_client&quot;: &quot;image83.webp&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:50:36.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:50:36.000000Z&quot;,
            &quot;name&quot;: &quot;SMK NU HaurGeulis&quot;,
            &quot;status&quot;: 2
        },
        {
            &quot;id&quot;: 25,
            &quot;foto_client&quot;: &quot;image64.webp&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:51:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:51:10.000000Z&quot;,
            &quot;name&quot;: &quot;SMK As-Salam&quot;,
            &quot;status&quot;: 2
        },
        {
            &quot;id&quot;: 26,
            &quot;foto_client&quot;: &quot;image66.webp&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:51:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-25T07:21:31.000000Z&quot;,
            &quot;name&quot;: &quot;SMKN Puspahiang&quot;,
            &quot;status&quot;: 2
        },
        {
            &quot;id&quot;: 27,
            &quot;foto_client&quot;: &quot;image67.webp&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:51:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:51:57.000000Z&quot;,
            &quot;name&quot;: &quot;SMK PGRI&quot;,
            &quot;status&quot;: 2
        },
        {
            &quot;id&quot;: 28,
            &quot;foto_client&quot;: &quot;image68.webp&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:52:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-25T07:10:26.000000Z&quot;,
            &quot;name&quot;: &quot;SMKN 1 Widisari&quot;,
            &quot;status&quot;: 0
        },
        {
            &quot;id&quot;: 29,
            &quot;foto_client&quot;: &quot;Frame 1597883476.png&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:56:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:56:09.000000Z&quot;,
            &quot;name&quot;: &quot;Jabar&quot;,
            &quot;status&quot;: 0
        },
        {
            &quot;id&quot;: 30,
            &quot;foto_client&quot;: &quot;Frame 1597883499.png&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:56:30.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:56:30.000000Z&quot;,
            &quot;name&quot;: &quot;detik.com&quot;,
            &quot;status&quot;: 0
        },
        {
            &quot;id&quot;: 31,
            &quot;foto_client&quot;: &quot;Frame 1597883485.png&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:56:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:56:44.000000Z&quot;,
            &quot;name&quot;: &quot;Kompas&quot;,
            &quot;status&quot;: 0
        },
        {
            &quot;id&quot;: 32,
            &quot;foto_client&quot;: &quot;Frame 1597883484.png&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:57:00.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:57:00.000000Z&quot;,
            &quot;name&quot;: &quot;Tribun News&quot;,
            &quot;status&quot;: 0
        },
        {
            &quot;id&quot;: 33,
            &quot;foto_client&quot;: &quot;Frame 1597883501.png&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:57:14.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:57:14.000000Z&quot;,
            &quot;name&quot;: &quot;Koran sindo&quot;,
            &quot;status&quot;: 0
        },
        {
            &quot;id&quot;: 34,
            &quot;foto_client&quot;: &quot;Frame 1597883496.png&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:57:28.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:57:28.000000Z&quot;,
            &quot;name&quot;: &quot;Republika&quot;,
            &quot;status&quot;: 0
        },
        {
            &quot;id&quot;: 35,
            &quot;foto_client&quot;: &quot;Frame 1597883505.png&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:57:47.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:57:47.000000Z&quot;,
            &quot;name&quot;: &quot;Pojok Satu&quot;,
            &quot;status&quot;: 0
        },
        {
            &quot;id&quot;: 36,
            &quot;foto_client&quot;: &quot;Frame 1597883506.png&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:58:11.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T18:58:11.000000Z&quot;,
            &quot;name&quot;: &quot;Sindo Media&quot;,
            &quot;status&quot;: 0
        },
        {
            &quot;id&quot;: 37,
            &quot;foto_client&quot;: &quot;K2UwuQCESXRCbUr1155N.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T18:58:40.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-03T08:15:48.000000Z&quot;,
            &quot;name&quot;: &quot;Antara News&quot;,
            &quot;status&quot;: 0
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-about-clients" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-about-clients"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-about-clients"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-about-clients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-about-clients">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-about-clients" data-method="GET"
      data-path="api/about/clients"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-about-clients', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-about-clients"
                    onclick="tryItOut('GETapi-about-clients');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-about-clients"
                    onclick="cancelTryOut('GETapi-about-clients');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-about-clients"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/about/clients</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-about-clients"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-about-clients"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-profile-setting">GET api/profile-setting</h2>

<p>
</p>



<span id="example-requests-GETapi-profile-setting">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/profile-setting" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/profile-setting"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-profile-setting">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 9,
            &quot;nama_tempat&quot;: &quot;Hexagon Inc.&quot;,
            &quot;lokasi&quot;: &quot;Jl. Abdul Halim No.128, RT.01/RW.3, Cigugur Tengah, Kec. Cimahi Tengah, Kota Cimahi, Jawa Barat 40522&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T05:51:05.000000Z&quot;,
            &quot;updated_at&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-profile-setting" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-profile-setting"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-profile-setting"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-profile-setting" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-profile-setting">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-profile-setting" data-method="GET"
      data-path="api/profile-setting"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-profile-setting', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-profile-setting"
                    onclick="tryItOut('GETapi-profile-setting');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-profile-setting"
                    onclick="cancelTryOut('GETapi-profile-setting');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-profile-setting"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/profile-setting</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-profile-setting"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-profile-setting"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-contact">GET api/contact</h2>

<p>
</p>



<span id="example-requests-GETapi-contact">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/contact" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/contact"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contact">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;notlp&quot;: &quot;(+62) 812 2218 1823&quot;,
            &quot;email&quot;: &quot;contact@hexagon.co.id&quot;,
            &quot;instagram_url&quot;: &quot;https://www.instagram.com/hexagoninc_&quot;,
            &quot;youtube_url&quot;: &quot;https://www.youtube.com/@Hexagon-Inc&quot;,
            &quot;facebook_url&quot;: &quot;https://web.facebook.com/infolokerbdg.id/posts/hexagon-inc-pt-hexagon-karyatama-indonesiawe-are-hiring-laravel-fullstack-develo/300203526373718/?_rdc=1&amp;_rdr#&quot;,
            &quot;linkedin_url&quot;: &quot;#&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: &quot;2025-07-03T07:41:15.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contact" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contact"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contact"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contact" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contact">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contact" data-method="GET"
      data-path="api/contact"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contact', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contact"
                    onclick="tryItOut('GETapi-contact');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contact"
                    onclick="cancelTryOut('GETapi-contact');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contact"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contact</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contact"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contact"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-gallery">GET api/gallery</h2>

<p>
</p>



<span id="example-requests-GETapi-gallery">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/gallery" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/gallery"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-gallery">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 34,
            &quot;image&quot;: &quot;1738797530.webp&quot;,
            &quot;created_at&quot;: &quot;2025-02-06T06:18:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-06T06:18:51.000000Z&quot;
        },
        {
            &quot;id&quot;: 35,
            &quot;image&quot;: &quot;1738797532.webp&quot;,
            &quot;created_at&quot;: &quot;2025-02-06T06:18:52.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-06T06:18:52.000000Z&quot;
        },
        {
            &quot;id&quot;: 36,
            &quot;image&quot;: &quot;1738797533.webp&quot;,
            &quot;created_at&quot;: &quot;2025-02-06T06:18:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-06T06:18:53.000000Z&quot;
        },
        {
            &quot;id&quot;: 37,
            &quot;image&quot;: &quot;1738797534.webp&quot;,
            &quot;created_at&quot;: &quot;2025-02-06T06:18:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-06T06:18:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 38,
            &quot;image&quot;: &quot;1738742516.webp&quot;,
            &quot;created_at&quot;: &quot;2025-02-06T06:18:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-06T06:18:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 39,
            &quot;image&quot;: &quot;1738797535.webp&quot;,
            &quot;created_at&quot;: &quot;2025-02-06T06:18:55.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-06T06:18:55.000000Z&quot;
        },
        {
            &quot;id&quot;: 40,
            &quot;image&quot;: &quot;1738797536.webp&quot;,
            &quot;created_at&quot;: &quot;2025-02-06T06:18:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-06T06:18:56.000000Z&quot;
        },
        {
            &quot;id&quot;: 44,
            &quot;image&quot;: &quot;1750997728_logoo.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-27T04:15:28.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-27T04:15:28.000000Z&quot;
        },
        {
            &quot;id&quot;: 46,
            &quot;image&quot;: &quot;1750999084_WhatsApp Image 2025-05-17 at 17.06.21_ef422cd4.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-27T04:38:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-27T04:38:04.000000Z&quot;
        },
        {
            &quot;id&quot;: 48,
            &quot;image&quot;: &quot;1751266142_WhatsApp Image 2025-06-30 at 13.47.22_55e988d5.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T06:49:02.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T06:49:02.000000Z&quot;
        },
        {
            &quot;id&quot;: 49,
            &quot;image&quot;: &quot;1751523387_logoo.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-07-03T06:16:11.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-03T06:16:27.000000Z&quot;
        },
        {
            &quot;id&quot;: 50,
            &quot;image&quot;: &quot;1751523371_WhatsApp Image 2025-06-30 at 13.47.22_55e988d5.jpg&quot;,
            &quot;created_at&quot;: &quot;2025-07-03T06:16:11.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-03T06:16:11.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-gallery" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-gallery"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-gallery"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-gallery" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-gallery">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-gallery" data-method="GET"
      data-path="api/gallery"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-gallery', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-gallery"
                    onclick="tryItOut('GETapi-gallery');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-gallery"
                    onclick="cancelTryOut('GETapi-gallery');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-gallery"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/gallery</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-gallery"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-gallery"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-job">GET api/job</h2>

<p>
</p>



<span id="example-requests-GETapi-job">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/job" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/job"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-job">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 4,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;Budi Imam Prasetyo&quot;,
            &quot;email&quot;: &quot;budiimamprsty@gmail.com&quot;,
            &quot;phone&quot;: &quot;085862989008&quot;,
            &quot;position&quot;: &quot;Frontend Developer&quot;,
            &quot;summary&quot;: &quot;Saya bisa menggunakan Vue JS&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-04-23T04:53:34.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-23T04:53:34.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;Budi Imam Prasetyo&quot;,
            &quot;email&quot;: &quot;budiimamprasetyo@gmail.com&quot;,
            &quot;phone&quot;: &quot;08927718281&quot;,
            &quot;position&quot;: &quot;UI/UX Designer&quot;,
            &quot;summary&quot;: &quot;Saya bisa menggunakan figma, adobe XD&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-04-23T15:21:00.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-23T15:21:00.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;Dimas Kurniawan&quot;,
            &quot;email&quot;: &quot;dimaskurniawan2290@gmail.com&quot;,
            &quot;phone&quot;: &quot;089513990786&quot;,
            &quot;position&quot;: &quot;Frontend Developer&quot;,
            &quot;summary&quot;: &quot;Saya Dimas Kurniawan Lulusan Politeknik Negeri Bandung dengan jurusan Teknik Informatika. Memiliki minat dalam pengembangan perangkat lunak, dengan kemampuan yang kuat untuk belajar dan beradaptasi dengan teknologi dan lingkungan baru dengan cepat.&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-05-10T02:06:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-05-10T02:06:17.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;Dimas Kurniawan&quot;,
            &quot;email&quot;: &quot;dimaskurniawan2290@gmail.com&quot;,
            &quot;phone&quot;: &quot;089513990786&quot;,
            &quot;position&quot;: &quot;Frontend Developer&quot;,
            &quot;summary&quot;: &quot;Saya Dimas Kurniawan Lulusan Politeknik Negeri Bandung dengan jurusan Teknik Informatika. Memiliki minat dalam pengembangan perangkat lunak, dengan kemampuan yang kuat untuk belajar dan beradaptasi dengan teknologi dan lingkungan baru dengan cepat.&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-05-10T02:06:27.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-05-10T02:06:27.000000Z&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;Dimas Kurniawan&quot;,
            &quot;email&quot;: &quot;dimaskurniawan2290@gmail.com&quot;,
            &quot;phone&quot;: &quot;089513990786&quot;,
            &quot;position&quot;: &quot;Frontend Developer&quot;,
            &quot;summary&quot;: &quot;Saya Dimas Kurniawan Lulusan Politeknik Negeri Bandung dengan jurusan Teknik Informatika. Memiliki minat dalam pengembangan perangkat lunak, dengan kemampuan yang kuat untuk belajar dan beradaptasi dengan teknologi dan lingkungan baru dengan cepat.&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-05-10T02:06:28.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-05-10T02:06:28.000000Z&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;Dimas Kurniawan&quot;,
            &quot;email&quot;: &quot;dimaskurniawan2290@gmail.com&quot;,
            &quot;phone&quot;: &quot;089513990786&quot;,
            &quot;position&quot;: &quot;Frontend Developer&quot;,
            &quot;summary&quot;: &quot;Saya Dimas Kurniawan Lulusan Politeknik Negeri Bandung dengan jurusan Teknik Informatika. Memiliki minat dalam pengembangan perangkat lunak, dengan kemampuan yang kuat untuk belajar dan beradaptasi dengan teknologi dan lingkungan baru dengan cepat.&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-05-10T02:06:28.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-05-10T02:06:28.000000Z&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;Dimas Kurniawan&quot;,
            &quot;email&quot;: &quot;dimaskurniawan2290@gmail.com&quot;,
            &quot;phone&quot;: &quot;089513990786&quot;,
            &quot;position&quot;: &quot;Frontend Developer&quot;,
            &quot;summary&quot;: &quot;Saya Dimas Kurniawan Lulusan Politeknik Negeri Bandung dengan jurusan Teknik Informatika. Memiliki minat dalam pengembangan perangkat lunak, dengan kemampuan yang kuat untuk belajar dan beradaptasi dengan teknologi dan lingkungan baru dengan cepat.&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-05-10T02:06:34.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-05-10T02:06:34.000000Z&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;Dimas Kurniawan&quot;,
            &quot;email&quot;: &quot;dimaskurniawan2290@gmail.com&quot;,
            &quot;phone&quot;: &quot;089513990786&quot;,
            &quot;position&quot;: &quot;Frontend Developer&quot;,
            &quot;summary&quot;: &quot;Saya Dimas Kurniawan Lulusan Politeknik Negeri Bandung dengan jurusan Teknik Informatika. Memiliki minat dalam pengembangan perangkat lunak, dengan kemampuan yang kuat untuk belajar dan beradaptasi dengan teknologi dan lingkungan baru dengan cepat.&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-05-10T02:07:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-05-10T02:07:51.000000Z&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;Dhirly Ramadhan&quot;,
            &quot;email&quot;: &quot;dhirly.work@gmail.com&quot;,
            &quot;phone&quot;: &quot;628979299519&quot;,
            &quot;position&quot;: &quot;Frontend Developer&quot;,
            &quot;summary&quot;: &quot;I am a passionate and detail-oriented frontend developer with expertise in React.js and TypeScript. My skill set includes advanced frontend techniques including Higher-Order Components (HOC) and Compound Component Pattern., code-splitting and lazy loading for performance optimization, and seamless API integration using tools like Axios and React Query. I have experience implementing responsive, accessible, and maintainable UI components, as well as optimizing Lighthouse scores and Core Web Vitals.\r\n\r\nVisit my portfolio: dhirly-ramadhan-portfolio-delta.vercel.app&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-05-13T21:58:01.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-05-13T21:58:01.000000Z&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;Vicky Pratama Setia Mahardika&quot;,
            &quot;email&quot;: &quot;vickymahardyka76@gmail.com&quot;,
            &quot;phone&quot;: &quot;082237282128&quot;,
            &quot;position&quot;: &quot;Frontend Developer&quot;,
            &quot;summary&quot;: &quot;Saya adalah lulusan dari prodi S1 Sistem Informasi - Universitas Negeri Surabaya tahun 2024. Saya memiliki ketertarikan dalam bidang pengembangan web termasuk FrontEnd Developer. Untuk bahasa pemrograman yang sering saya gunakan yaitu JavaScript dan TypeScript.&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-05-14T18:29:16.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-05-14T18:29:16.000000Z&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;andre irawan&quot;,
            &quot;email&quot;: &quot;andreirawan313@gmail.com&quot;,
            &quot;phone&quot;: &quot;087823306656&quot;,
            &quot;position&quot;: &quot;Frontend Developer&quot;,
            &quot;summary&quot;: &quot;Nama Saya Andre Irawan, di pekerjaan sebelumnya saya bertanggung jawab dalam pengembangan UI untuk aplikasi desktop (core) menggunakan angular. Saya juga bertanggung jawab dalam pembuatan dan pengembangan aplikasi mobile menggunakan flutter dan dashboard web menggunakan flutter web. Aplikasi yang saya buat adalah aplikasi pengelolaan pendapatan daerah untuk pemda. Selain itu, saya juga mengerjakan beberapa project menggunakan vue.js dan Go.&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-05-20T06:11:42.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-05-20T06:11:42.000000Z&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;job_id&quot;: 12,
            &quot;full_name&quot;: &quot;Miftah Iqbal Firmansyah&quot;,
            &quot;email&quot;: &quot;miftah.it2@gmail.com&quot;,
            &quot;phone&quot;: &quot;088220986156&quot;,
            &quot;position&quot;: &quot;Frontend Developer&quot;,
            &quot;summary&quot;: &quot;Halo, saya Miftah Iqbal Firmansyah, seorang Frontend Developer dengan pengalaman lebih dari 5 tahun dalam membangun antarmuka web interaktif dan responsif menggunakan framework modern seperti React.js dan Vue.js. Saya terbiasa berkolaborasi erat dengan tim desain dan backend untuk memastikan integrasi API berjalan mulus dan hasil akhir sesuai dengan kebutuhan pengguna maupun bisnis.\r\n\r\nSelama karier saya, saya telah mengembangkan berbagai aplikasi internal untuk institusi perbankan besar seperti Bank Mandiri dan Bank Syariah Indonesia, dengan fokus pada performa, keamanan, dan pengalaman pengguna. Saya juga memiliki perhatian besar terhadap detail, serta terbiasa menulis kode yang bersih dan terstruktur menggunakan teknologi seperti Tailwind CSS, Axios, dan berbagai UI Library.\r\n\r\nSaya percaya kolaborasi yang solid dan komunikasi yang jelas adalah kunci dalam menghasilkan produk digital berkualitas. Dengan semangat belajar yang tinggi dan kemampuan beradaptasi dengan cepat, saya siap memberikan kontribusi terbaik sebagai bagian dari tim Anda.&quot;,
            &quot;resume_path&quot;: &quot;0&quot;,
            &quot;created_at&quot;: &quot;2025-06-19T14:19:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-19T14:19:23.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-job" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-job"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-job"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-job" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-job">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-job" data-method="GET"
      data-path="api/job"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-job', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-job"
                    onclick="tryItOut('GETapi-job');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-job"
                    onclick="cancelTryOut('GETapi-job');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-job"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/job</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-job"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-job"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-about-main">GET api/about/main</h2>

<p>
</p>



<span id="example-requests-GETapi-about-main">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/about/main" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/about/main"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-about-main">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;youtube_url&quot;: &quot;https://www.youtube.com/embed/qJi7nM1U_m4?si=eOc4VPOnXI5zZxd&quot;,
            &quot;journey_title&quot;: &quot;A Legacy of Innovation and Growth&quot;,
            &quot;journey_text_1&quot;: &quot;Indonesia, Hexagon Inc. is a\r\n                    company that operates in\r\n                    the field of digital artwork and IT solutions. With a focus on education and a commitment to\r\n                    providing high-quality services, we have established ourselves as a leading provider in our\r\n                    industry.&quot;,
            &quot;journey_text_2&quot;: &quot;Starting its business in 2017 as a Strategic Business Unit of PT. Mizab Nusantara Kemilau, Hexagon\r\n                    Inc. has now grown into an independent company that thrives as a digital services provider. The\r\n                    company was reestablished in response to the growing demand in the digital industry while empowering\r\n                    potential and professional individuals during the pandemic situation.&quot;,
            &quot;philosophy&quot;: &quot;At Hexagon Inc., we are inspired by the bee, a creature esteemed in Islamic teachings as a special creation bestowed with wisdom (Surat An-Nahl, 68-69). Bees live with purpose, gathering from the best of nature and producing with goodness and benefit. Their loyalty, intelligence, and strength resonate with us. Just as bees always find their way home, we aim to navigate challenges with resilience and integrity, finding solutions regardless of the journey&rsquo;s difficulty..&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-about-main" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-about-main"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-about-main"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-about-main" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-about-main">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-about-main" data-method="GET"
      data-path="api/about/main"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-about-main', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-about-main"
                    onclick="tryItOut('GETapi-about-main');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-about-main"
                    onclick="cancelTryOut('GETapi-about-main');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-about-main"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/about/main</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-about-main"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-about-main"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-messages">GET api/messages</h2>

<p>
</p>



<span id="example-requests-GETapi-messages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/messages" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/messages"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-messages">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;fullName&quot;: &quot;Rifa Radwa Prasetya&quot;,
            &quot;email&quot;: &quot;rifaradwa@gmail.com&quot;,
            &quot;subject&quot;: &quot;Subject 1&quot;,
            &quot;message&quot;: &quot;Looong Messages&quot;,
            &quot;created_at&quot;: &quot;2025-04-11T14:42:43.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-11T14:42:43.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;fullName&quot;: &quot;Budi Imam Prasetyo&quot;,
            &quot;email&quot;: &quot;budimamprsty@gmail.com&quot;,
            &quot;subject&quot;: &quot;subject-2&quot;,
            &quot;message&quot;: &quot;Helow&quot;,
            &quot;created_at&quot;: &quot;2025-04-11T20:09:47.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-11T20:09:47.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-messages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-messages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-messages"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-messages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-messages">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-messages" data-method="GET"
      data-path="api/messages"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-messages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-messages"
                    onclick="tryItOut('GETapi-messages');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-messages"
                    onclick="cancelTryOut('GETapi-messages');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-messages"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/messages</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-messages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-messages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-news">GET api/news</h2>

<p>
</p>



<span id="example-requests-GETapi-news">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/news" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/news"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-news">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;news_id&quot;: 41,
            &quot;category_id&quot;: &quot;Pendidikan,Teknologi&quot;,
            &quot;judul_news&quot;: &quot;Kampus Merdeka di Era Digital: Tantangan dan Peluang bagi Mahasiswa Indonesia.&quot;,
            &quot;ket_news&quot;: &quot;Program &ldquo;Kampus Merdeka&rdquo; yang digagas oleh Kemendikbudristek terus berevolusi mengikuti tren digitalisasi. Pada semester genap 2025, tercatat 162 perguruan tinggi telah menerapkan skema kurikulum berbasis proyek, magang, dan pertukaran pelajar industri. Data PDDikti menunjukkan peningkatan partisipasi mahasiswa bidang TI dan data science sebesar 28&nbsp;% dibanding tahun sebelumnya, meski masih ada kesenjangan infrastruktur di wilayah 3T.\r\nBeberapa kampus, seperti Universitas Indonesia, sudah membangun laboratorium virtual reality untuk simulasi industri, sedangkan di kampus daerah masih terkendala bandwidth dan pelatihan dosen. Pemerintah menyiapkan insentif hibah IT senilai Rp&nbsp;200&nbsp;miliar untuk memperkuat konektivitas dan pelatihan digital di 50 perguruan tinggi terpilih.&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T17:30:59.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-21T07:44:20.000000Z&quot;,
            &quot;url_youtube&quot;: null
        },
        {
            &quot;news_id&quot;: 42,
            &quot;category_id&quot;: &quot;Pendidikan,Teknologi&quot;,
            &quot;judul_news&quot;: &quot;Startup EduTech &ldquo;Belajar Pintar&rdquo; Raih Pendanaan Seri A senilai Rp&nbsp;50&nbsp;M&quot;,
            &quot;ket_news&quot;: &quot;Belajar Pintar, platform edukasi digital yang diluncurkan tahun 2023, berhasil menggalang modal Seri&nbsp;A sebesar Rp&nbsp;50&nbsp;miliar dari konsorsium ventura Asia Tenggara. CEO Anisa Putri menyatakan dana akan difokuskan pada pengembangan AI tutor, ekspansi ke Sumatera dan Kalimantan, serta kolaborasi dengan 500 sekolah swasta.\r\nFitur baru mencakup kuis adaptif berbasis machine learning dan modul video interaktif. Sejak Q1&nbsp;2025, jumlah pengguna aktif naik dari 300&nbsp;ribu menjadi 450&nbsp;ribu pelajar. Belajar Pintar juga menjajaki kemitraan dengan Kementerian Agama untuk menyasar 20&nbsp;ribu madrasah.&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T17:36:13.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T17:36:13.000000Z&quot;,
            &quot;url_youtube&quot;: null
        },
        {
            &quot;news_id&quot;: 45,
            &quot;category_id&quot;: &quot;Teknologi,Sains&quot;,
            &quot;judul_news&quot;: &quot;Peluncuran Pusat Inovasi AI di Universitas Teknologi Surabaya&quot;,
            &quot;ket_news&quot;: &quot;Universitas Teknologi Surabaya (UTS) resmi membuka AI Innovation Hub pada 18 April 2025. Didukung hibah pemerintah dan swasta senilai Rp&nbsp;10&nbsp;miliar, pusat ini dilengkapi GPU high‑performance, ruang kolaborasi startup, dan program inkubasi bagi mahasiswa.\r\nRektor UTS, Prof. Budi Santoso, menargetkan 30 startup berbasis AI lahir dalam 2&nbsp;tahun ke depan. Fokus riset meliputi otomasi manufaktur, prediksi hasil pertanian, dan analisis big data pelayanan publik.&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T17:38:34.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T17:38:34.000000Z&quot;,
            &quot;url_youtube&quot;: null
        },
        {
            &quot;news_id&quot;: 46,
            &quot;category_id&quot;: &quot;Kesehatan,Teknologi&quot;,
            &quot;judul_news&quot;: &quot;Transformasi Digital di Sektor Kesehatan: Layanan Konsultasi IT Hexagon Karyatama&quot;,
            &quot;ket_news&quot;: &quot;PT Hexagon Karyatama Indonesia meluncurkan layanan konsultasi transformasi digital khusus sektor kesehatan. Layanan mencakup audit sistem informasi, integrasi telemedicine, dan implementasi standar HIPAA serta ISO&nbsp;27001.\r\nMenurut Rina Mahardika, Head of IT Consulting, minat rumah sakit swasta meningkat 40&nbsp;% sejak akhir 2024. Proyek pilot pertama akan dijalankan di tiga RSU di Jawa Barat, dengan target digitalisasi rekam medis dan layanan antrian online sebelum akhir 2025.&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T17:39:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T17:39:50.000000Z&quot;,
            &quot;url_youtube&quot;: null
        },
        {
            &quot;news_id&quot;: 47,
            &quot;category_id&quot;: &quot;Pendidikan,Teknologi&quot;,
            &quot;judul_news&quot;: &quot;Implementasi 5G di Sekolah Negeri: Studi Kasus SMAN&nbsp;5 Bogor&quot;,
            &quot;ket_news&quot;: &quot;SMP Negeri&nbsp;5 Bogor menjadi pilot project 5G di sekolah negeri, bekerja sama dengan salah satu operator telekomunikasi. Fasilitas 5G memungkinkan siswa mengakses konten pembelajaran VR dan AR tanpa lag.\r\nKepala Sekolah Suryani melaporkan peningkatan partisipasi praktikum sains hingga 30&nbsp;%. Tantangan utama adalah kesiapan guru dalam mengelola konten digital; pihak sekolah kini menggelar pelatihan bulanan. Pemerintah kota mendukung dengan anggaran Rp&nbsp;2&nbsp;miliar untuk infrastruktur IT.&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T17:41:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T17:41:21.000000Z&quot;,
            &quot;url_youtube&quot;: null
        },
        {
            &quot;news_id&quot;: 48,
            &quot;category_id&quot;: &quot;Teknologi&quot;,
            &quot;judul_news&quot;: &quot;Platform Kolaborasi Developer &ldquo;CodeLink&rdquo; Bantu Proyek Open Source Lokal&quot;,
            &quot;ket_news&quot;: &quot;CodeLink, platform kolaborasi kode buatan komunitas developer Indonesia, resmi rilis April 2025 setelah 2&nbsp;tahun beta. Fitur utamanya meliputi peer code review, manajemen issue, dan hosting repositori gratis.\r\nLebih dari 250 proyek open source telah bergabung&mdash;mulai aplikasi e‑Governmen hingga sistem informasi desa. Co‑founder Andi Wijaya menyatakan targetnya mencapai 1.000 proyek pada akhir 2025 dan membuka program mentoring untuk pemula.&quot;,
            &quot;created_at&quot;: &quot;2025-04-20T17:42:26.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-20T17:42:26.000000Z&quot;,
            &quot;url_youtube&quot;: null
        },
        {
            &quot;news_id&quot;: 49,
            &quot;category_id&quot;: &quot;Sains&quot;,
            &quot;judul_news&quot;: &quot;bitcoin naik&quot;,
            &quot;ket_news&quot;: &quot;hello&quot;,
            &quot;created_at&quot;: &quot;2025-04-21T07:43:43.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-21T07:43:43.000000Z&quot;,
            &quot;url_youtube&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-news" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-news"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-news"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-news" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-news">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-news" data-method="GET"
      data-path="api/news"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-news', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-news"
                    onclick="tryItOut('GETapi-news');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-news"
                    onclick="cancelTryOut('GETapi-news');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-news"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/news</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-news"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-news"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-news--id-">GET api/news/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-news--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/news/41" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/news/41"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-news--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;news_id&quot;: 41,
        &quot;category_id&quot;: &quot;Pendidikan,Teknologi&quot;,
        &quot;judul_news&quot;: &quot;Kampus Merdeka di Era Digital: Tantangan dan Peluang bagi Mahasiswa Indonesia.&quot;,
        &quot;ket_news&quot;: &quot;Program &ldquo;Kampus Merdeka&rdquo; yang digagas oleh Kemendikbudristek terus berevolusi mengikuti tren digitalisasi. Pada semester genap 2025, tercatat 162 perguruan tinggi telah menerapkan skema kurikulum berbasis proyek, magang, dan pertukaran pelajar industri. Data PDDikti menunjukkan peningkatan partisipasi mahasiswa bidang TI dan data science sebesar 28&nbsp;% dibanding tahun sebelumnya, meski masih ada kesenjangan infrastruktur di wilayah 3T.\r\nBeberapa kampus, seperti Universitas Indonesia, sudah membangun laboratorium virtual reality untuk simulasi industri, sedangkan di kampus daerah masih terkendala bandwidth dan pelatihan dosen. Pemerintah menyiapkan insentif hibah IT senilai Rp&nbsp;200&nbsp;miliar untuk memperkuat konektivitas dan pelatihan digital di 50 perguruan tinggi terpilih.&quot;,
        &quot;created_at&quot;: &quot;2025-04-20T17:30:59.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-04-21T07:44:20.000000Z&quot;,
        &quot;url_youtube&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-news--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-news--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-news--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-news--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-news--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-news--id-" data-method="GET"
      data-path="api/news/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-news--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-news--id-"
                    onclick="tryItOut('GETapi-news--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-news--id-"
                    onclick="cancelTryOut('GETapi-news--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-news--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/news/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-news--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-news--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-news--id-"
               value="41"
               data-component="url">
    <br>
<p>The ID of the news. Example: <code>41</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-portofolio">GET api/portofolio</h2>

<p>
</p>



<span id="example-requests-GETapi-portofolio">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/portofolio" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/portofolio"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-portofolio">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;portofolio_id&quot;: 50,
            &quot;category_id&quot;: 3,
            &quot;judul_porto&quot;: &quot;ULBI&quot;,
            &quot;ket_porto&quot;: &quot;We optimized digital assets and marketing campaigns to boost student registrations at ULBI through various digital platforms. This project involved digital asset analysis, pixel integration for ad tracking, content creation and optimization, ad campaign launches, and campaign evaluations to meet conversion targets.&quot;,
            &quot;created_at&quot;: &quot;2025-01-19T20:29:01.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-19T20:29:01.000000Z&quot;,
            &quot;url_youtube&quot;: &quot;https://www.instagram.com/infopmbunjani/&quot;,
            &quot;youtube&quot;: null
        },
        {
            &quot;portofolio_id&quot;: 51,
            &quot;category_id&quot;: 4,
            &quot;judul_porto&quot;: &quot;Smartpol Application&quot;,
            &quot;ket_porto&quot;: &quot;Smartpol is a digital service specifically designed for political campaigns, helping clients effectively manage their campaign strategies with advanced technological solutions.&quot;,
            &quot;created_at&quot;: &quot;2025-01-19T23:12:02.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-19T23:12:02.000000Z&quot;,
            &quot;url_youtube&quot;: &quot;https://smartpol.info/&quot;,
            &quot;youtube&quot;: null
        },
        {
            &quot;portofolio_id&quot;: 52,
            &quot;category_id&quot;: 4,
            &quot;judul_porto&quot;: &quot;Berseka Application&quot;,
            &quot;ket_porto&quot;: &quot;Berseka is a waste management application designed to support efficient and eco-friendly waste management practices.&quot;,
            &quot;created_at&quot;: &quot;2025-01-19T23:13:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-19T23:13:50.000000Z&quot;,
            &quot;url_youtube&quot;: &quot;https://smartpol.info/&quot;,
            &quot;youtube&quot;: null
        },
        {
            &quot;portofolio_id&quot;: 53,
            &quot;category_id&quot;: 4,
            &quot;judul_porto&quot;: &quot;Jatidiri.app&quot;,
            &quot;ket_porto&quot;: &quot;Jatidiri is a super app focused on psychology, helping users discover their potential, interests, and talents, along with providing online psychological consultation services.&quot;,
            &quot;created_at&quot;: &quot;2025-01-19T23:14:24.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-19T23:14:24.000000Z&quot;,
            &quot;url_youtube&quot;: &quot;https://jatidiri.app&quot;,
            &quot;youtube&quot;: null
        },
        {
            &quot;portofolio_id&quot;: 54,
            &quot;category_id&quot;: 4,
            &quot;judul_porto&quot;: &quot;Edutama - Aplikasi Sistem Keauangan Sekolah dan Pesantren&quot;,
            &quot;ket_porto&quot;: &quot;Edutama is a financial application designed to assist private schools, boarding schools, and other educational institutions in managing their finances more efficiently.&quot;,
            &quot;created_at&quot;: &quot;2025-01-19T23:15:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-19T23:15:06.000000Z&quot;,
            &quot;url_youtube&quot;: &quot;https://edutama.pro&quot;,
            &quot;youtube&quot;: null
        },
        {
            &quot;portofolio_id&quot;: 55,
            &quot;category_id&quot;: 5,
            &quot;judul_porto&quot;: &quot;KEMENKOP RI&quot;,
            &quot;ket_porto&quot;: &quot;We delivered presentations for KEMENKOP, providing valuable insights and supporting their initiatives through in-depth education and comprehensive discussions.&quot;,
            &quot;created_at&quot;: &quot;2025-01-19T23:16:26.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T06:43:00.000000Z&quot;,
            &quot;url_youtube&quot;: &quot;https://edutama.pro&quot;,
            &quot;youtube&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-portofolio" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-portofolio"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-portofolio"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-portofolio" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-portofolio">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-portofolio" data-method="GET"
      data-path="api/portofolio"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-portofolio', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-portofolio"
                    onclick="tryItOut('GETapi-portofolio');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-portofolio"
                    onclick="cancelTryOut('GETapi-portofolio');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-portofolio"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/portofolio</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-portofolio"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-portofolio"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-portofolio--id-">GET api/portofolio/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-portofolio--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/portofolio/50" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/portofolio/50"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-portofolio--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;portofolio_id&quot;: 50,
        &quot;category_id&quot;: 3,
        &quot;judul_porto&quot;: &quot;ULBI&quot;,
        &quot;ket_porto&quot;: &quot;We optimized digital assets and marketing campaigns to boost student registrations at ULBI through various digital platforms. This project involved digital asset analysis, pixel integration for ad tracking, content creation and optimization, ad campaign launches, and campaign evaluations to meet conversion targets.&quot;,
        &quot;created_at&quot;: &quot;2025-01-19T20:29:01.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-19T20:29:01.000000Z&quot;,
        &quot;url_youtube&quot;: &quot;https://www.instagram.com/infopmbunjani/&quot;,
        &quot;youtube&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-portofolio--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-portofolio--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-portofolio--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-portofolio--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-portofolio--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-portofolio--id-" data-method="GET"
      data-path="api/portofolio/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-portofolio--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-portofolio--id-"
                    onclick="tryItOut('GETapi-portofolio--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-portofolio--id-"
                    onclick="cancelTryOut('GETapi-portofolio--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-portofolio--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/portofolio/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-portofolio--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-portofolio--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-portofolio--id-"
               value="50"
               data-component="url">
    <br>
<p>The ID of the portofolio. Example: <code>50</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-profile">GET api/profile</h2>

<p>
</p>



<span id="example-requests-GETapi-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-profile">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;logo&quot;: &quot;ig.png&quot;,
            &quot;nama&quot;: &quot;instagram&quot;,
            &quot;link&quot;: &quot;https://www.instagram.com/hexagoninc_&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null
        },
        {
            &quot;id&quot;: 2,
            &quot;logo&quot;: &quot;yt.png&quot;,
            &quot;nama&quot;: &quot;youtube&quot;,
            &quot;link&quot;: &quot;https://www.youtube.com/@Hexagon-Inc&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null
        },
        {
            &quot;id&quot;: 3,
            &quot;logo&quot;: &quot;fb.png&quot;,
            &quot;nama&quot;: &quot;facebook&quot;,
            &quot;link&quot;: &quot;https://web.facebook.com/infolokerbdg.id/posts/hex..&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null
        },
        {
            &quot;id&quot;: 4,
            &quot;logo&quot;: &quot;link.png&quot;,
            &quot;nama&quot;: &quot;linkendl&quot;,
            &quot;link&quot;: &quot;#&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-profile" data-method="GET"
      data-path="api/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-profile"
                    onclick="tryItOut('GETapi-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-profile"
                    onclick="cancelTryOut('GETapi-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-review">GET api/review</h2>

<p>
</p>



<span id="example-requests-GETapi-review">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/review" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/review"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-review">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;review&quot;: &quot;Hexagon Karyatama Indonesia membantu transformasi digital rumah sakit kami dengan sangat profesional. Mulai dari audit sistem hingga implementasi telemedicine, semua berjalan lancar dan tepat waktu.&quot;,
            &quot;foto&quot;: &quot;https://placehold.co/150?text=Dr.+Agus&quot;,
            &quot;nama&quot;: &quot;Dr. Agus Santoso&quot;,
            &quot;dari&quot;: &quot;RSU Harapan Bunda&quot;,
            &quot;created_at&quot;: &quot;2025-04-15T09:15:00.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-15T09:15:00.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;review&quot;: &quot;Tim Hexagon tidak hanya tanggap, tetapi juga proaktif dalam memberikan solusi IT yang sesuai kebutuhan industri manufaktur kami. Hasilnya, efisiensi produksi meningkat hingga 25&nbsp;%.&quot;,
            &quot;foto&quot;: &quot;https://placehold.co/150?text=Ibu+Rina&quot;,
            &quot;nama&quot;: &quot;Ibu Rina Maharani&quot;,
            &quot;dari&quot;: &quot;PT. Prima Manufacturing&quot;,
            &quot;created_at&quot;: &quot;2025-04-16T11:30:00.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-04-16T11:30:00.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;review&quot;: &quot;Implementasi sistem keamanan data dan backup berbasis cloud dari Hexagon Karyatama sangat membantu kami menjaga kontinuitas bisnis. Support-nya cepat dan dokumentasinya lengkap.&quot;,
            &quot;foto&quot;: &quot;https://placehold.co/150?text=Bapak+Arif&quot;,
            &quot;nama&quot;: &quot;Bapak Arif Nugroho&quot;,
            &quot;dari&quot;: &quot;PT. Global Finance&quot;,
            &quot;created_at&quot;: &quot;2025-04-17T14:45:00.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-03T06:24:27.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-review" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-review"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-review"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-review" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-review">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-review" data-method="GET"
      data-path="api/review"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-review', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-review"
                    onclick="tryItOut('GETapi-review');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-review"
                    onclick="cancelTryOut('GETapi-review');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-review"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/review</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-review"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-review"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-service">GET api/service</h2>

<p>
</p>



<span id="example-requests-GETapi-service">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/service" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/service"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-service">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;The Right Solution for Your Business&quot;,
            &quot;subtitle&quot;: &quot;We understand that every business has unique needs. That&#039;s why our services are flexible and tailored to align with your specific business goals.&quot;,
            &quot;created_at&quot;: &quot;2025-02-03T09:51:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-03T09:51:57.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Latest Technology, Best Solutions&quot;,
            &quot;subtitle&quot;: &quot;We integrate cutting-edge technology into every service to deliver optimal, effective, and always up-to-date results.&quot;,
            &quot;created_at&quot;: &quot;2025-02-03T10:10:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-03T10:10:51.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;Always Ahead Approach&quot;,
            &quot;subtitle&quot;: &quot;We don&rsquo;t just wait for opportunities&mdash;we proactively seek them and address challenges to ensure your business stays one step ahead.&quot;,
            &quot;created_at&quot;: &quot;2025-02-03T10:10:52.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-03T10:10:52.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: &quot;Efficient and Affordable&quot;,
            &quot;subtitle&quot;: &quot;We offer high-quality solutions at reasonable and transparent prices, providing the best value without compromising on quality.&quot;,
            &quot;created_at&quot;: &quot;2025-02-03T10:10:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-03T10:10:54.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-service" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-service"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-service"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-service" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-service">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-service" data-method="GET"
      data-path="api/service"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-service', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-service"
                    onclick="tryItOut('GETapi-service');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-service"
                    onclick="cancelTryOut('GETapi-service');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-service"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/service</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-service"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-service"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-value">GET api/value</h2>

<p>
</p>



<span id="example-requests-GETapi-value">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/value" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/value"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-value">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;type&quot;: 1,
            &quot;value&quot;: &quot;Learn|There is nothing more expert than a learner.&quot;,
            &quot;created_at&quot;: &quot;2024-12-28T09:20:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-01T04:10:05.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;type&quot;: 2,
            &quot;value&quot;: &quot;Think good|Think good, make a bright idea, give a solution&quot;,
            &quot;created_at&quot;: &quot;2024-12-28T09:20:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-01T04:10:05.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;type&quot;: 1,
            &quot;value&quot;: &quot;Bright|We Know the way, the path and the strategy, give the solution.&quot;,
            &quot;created_at&quot;: &quot;2024-12-28T09:21:41.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-01T04:10:05.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;type&quot;: 2,
            &quot;value&quot;: &quot;Do Better|Do better, learn more and more, update and upgrade, be the best version of yours&quot;,
            &quot;created_at&quot;: &quot;2024-12-28T09:21:42.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-01T04:10:05.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;type&quot;: 1,
            &quot;value&quot;: &quot;Idea|Thinking it the highest art, creativity is the way, innovation is the result.&quot;,
            &quot;created_at&quot;: &quot;2024-12-28T09:29:30.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-01T04:10:05.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;type&quot;: 2,
            &quot;value&quot;: &quot;Give the Best|Everything that happens is the best&quot;,
            &quot;created_at&quot;: &quot;2024-12-28T09:29:31.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-01T04:10:05.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-value" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-value"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-value"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-value" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-value">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-value" data-method="GET"
      data-path="api/value"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-value', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-value"
                    onclick="tryItOut('GETapi-value');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-value"
                    onclick="cancelTryOut('GETapi-value');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-value"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/value</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-value"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-value"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-vision">GET api/vision</h2>

<p>
</p>



<span id="example-requests-GETapi-vision">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/vision" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/vision"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-vision">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;type&quot;: 1,
            &quot;value&quot;: &quot;Our Vision is to be the leading provider of digital artwork and IT solutions in the industry. We strive to be at the forefront of innovation and to consistently exceed our clients expectations&quot;,
            &quot;created_at&quot;: &quot;2024-12-27T09:59:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-11T16:11:26.000000Z&quot;
        },
        {
            &quot;id&quot;: 25,
            &quot;type&quot;: 2,
            &quot;value&quot;: &quot;There is a belief that in order to grow a business, you have to be ruthless. But we believe there is a better way to grow. One where what is good for profits is also good for customers. We believe that business can grow with integrity and succeed with a sincere soul. That&#039;s why we create education applications and services, and communities that unite ecosystems to help businesses grow better every day..&quot;,
            &quot;created_at&quot;: &quot;2025-01-17T08:52:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-01T04:02:45.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-vision" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-vision"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-vision"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-vision" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-vision">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-vision" data-method="GET"
      data-path="api/vision"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-vision', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-vision"
                    onclick="tryItOut('GETapi-vision');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-vision"
                    onclick="cancelTryOut('GETapi-vision');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-vision"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/vision</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-vision"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-vision"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>

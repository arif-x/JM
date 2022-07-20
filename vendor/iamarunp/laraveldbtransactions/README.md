This package introduces the simplest way, you can achieve the database transaction without making your code complex, without making a lot of changes.the middleware can be used for individual routes or for a route group ,if an exception occurs then it will rollback from the Terminable Middleware. While if queries getting executed successfully then the transaction gets committed. In Laravel, DB facades provide the transaction for both query builder as well as eloquent ORM.
## Installation
```
        composer require iamarunp/laraveldbtransactions

```

    The terminate method will be automatically called after the response is ready to be sent to the browser.
The middleware is registered using TransactionServiceProvider, to use the provider, you need register the service provider.
<h3><a id="user-content-laravel-55" class="anchor" aria-hidden="true" href="#laravel-55"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Laravel 5.4 and below</h3>
To register your service provider, you just need to add an entry to the array of service providers in the config/app.php
file.

<div>
    <div id="highlighter_95058" class="syntaxhighlighter  php">
        <table border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td class="gutter">
                        <div class="line number1 index0 alt2">01</div>
                        <div class="line number2 index1 alt1">02</div>
                        <div class="line number3 index2 alt2">03</div>
                        <div class="line number4 index3 alt1">04</div>
                        <div class="line number5 index4 alt2">05</div>
                        <div class="line number6 index5 alt1">06</div>
                        <div class="line number7 index6 alt2">07</div>
                        <div class="line number8 index7 alt1">08</div>
                        <div class="line number9 index8 alt2">09</div>
                        <div class="line number10 index9 alt1">10</div>
                        <div class="line number11 index10 alt2">11</div>
                        <div class="line number12 index11 alt1">12</div>
                        <div class="line number13 index12 alt2">13</div>
                        <div class="line number14 index13 alt1">14</div>
                        <div class="line number15 index14 alt2">15</div>
                        <div class="line number16 index15 alt1">16</div>
                        <div class="line number17 index16 alt2">17</div>
                        <div class="line number18 index17 alt1">18</div>
                        <div class="line number19 index18 alt2">19</div>
                        <div class="line number20 index19 alt1">20</div>
                        <div class="line number21 index20 alt2">21</div>
                        <div class="line number22 index21 alt1">22</div>
                        <div class="line number23 index22 alt2">23</div>
                        <div class="line number24 index23 alt1">24</div>
                        <div class="line number25 index24 alt2">25</div>
                        <div class="line number26 index25 alt1">26</div>
                        <div class="line number27 index26 alt2">27</div>
                        <div class="line number28 index27 alt1">28</div>
                        <div class="line number29 index28 alt2">29</div>
                        <div class="line number30 index29 alt1">30</div>
                        <div class="line number31 index30 alt2">31</div>
                        <div class="line number32 index31 alt1">32</div>
                        <div class="line number33 index32 alt2">33</div>
                        <div class="line number34 index33 alt1">34</div>
                        <div class="line number35 index34 alt2">35</div>
                        <div class="line number36 index35 alt1">36</div>
                        <div class="line number37 index36 alt2">37</div>
                        <div class="line number38 index37 alt1">38</div>
                        <div class="line number39 index38 alt2">39</div>
                        <div class="line number40 index39 alt1">40</div>
                        <div class="line number41 index40 alt2">41</div>
                        <div class="line number42 index41 alt1">42</div>
                        <div class="line number43 index42 alt2">43</div>
                    </td>
                    <td class="code">
                        <div class="container">
                            <div class="line number1 index0 alt2"><code class="php string">'providers'</code> <code
                                    class="php plain">=&gt; [</code></div>
                            <div class="line number2 index1 alt1"><code class="php spaces">&nbsp;</code>&nbsp;</div>
                            <div class="line number3 index2 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php comments">/*</code></div>
                            <div class="line number4 index3 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php comments">* Laravel Framework Service Providers...</code></div>
                            <div class="line number5 index4 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php comments">*/</code></div>
                            <div class="line number6 index5 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Auth\AuthServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number7 index6 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Broadcasting\BroadcastServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number8 index7 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Bus\BusServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number9 index8 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Cache\CacheServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number10 index9 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number11 index10 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Cookie\CookieServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number12 index11 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Database\DatabaseServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number13 index12 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Encryption\EncryptionServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number14 index13 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Filesystem\FilesystemServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number15 index14 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Foundation\Providers\FoundationServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number16 index15 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Hashing\HashServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number17 index16 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Mail\MailServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number18 index17 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Notifications\NotificationServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number19 index18 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Pagination\PaginationServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number20 index19 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Pipeline\PipelineServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number21 index20 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Queue\QueueServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number22 index21 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Redis\RedisServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number23 index22 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Auth\Passwords\PasswordResetServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number24 index23 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Session\SessionServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number25 index24 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Translation\TranslationServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number26 index25 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\Validation\ValidationServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number27 index26 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Illuminate\View\ViewServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number28 index27 alt1"><code class="php spaces">&nbsp;</code>&nbsp;</div>
                            <div class="line number29 index28 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php comments">/*</code></div>
                            <div class="line number30 index29 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php comments">* Package Service Providers...</code></div>
                            <div class="line number31 index30 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php comments">*/</code></div>
                            <div class="line number32 index31 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">Laravel\Tinker\TinkerServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number33 index32 alt2"><code class="php spaces">&nbsp;</code>&nbsp;</div>
                            <div class="line number34 index33 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php comments">/*</code></div>
                            <div class="line number35 index34 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php comments">* Application Service Providers...</code></div>
                            <div class="line number36 index35 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php comments">*/</code></div>
                            <div class="line number37 index36 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">App\Providers\AppServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number38 index37 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">App\Providers\AuthServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number39 index38 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php comments">// App\Providers\BroadcastServiceProvider::class,</code></div>
                            <div class="line number40 index39 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">App\Providers\EventServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number41 index40 alt2"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">App\Providers\RouteServiceProvider::</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                            <div class="line number42 index41 alt1"><code
                                    class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                                    class="php plain">        iamarunp\Laraveldbtransactions\TransactionServiceProvider::,
</code><code
                                    class="php keyword">class</code><code class="php plain">,</code></div>
                                    <br>
                            <div class="line number43 index42 alt2"><code class="php plain">],</code></div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<h3><a id="user-content-laravel-55" class="anchor" aria-hidden="true" href="#laravel-55"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Laravel 5.5+</h3>
If you're using Laravel 5.5 or above, the package will automatically registered.

<h3><a id="user-content-laravel-55" class="anchor" aria-hidden="true" href="#laravel-55"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Assigning Middleware to Routes in Laravel</h3>

<h3> Using Route Group</h3>
<pre class="lang-php prettyprint prettyprinted" style="">
Route::group(['middleware' => 'TransactionHandler'], function () {

    Route::get('/home', [
        'as' => 'home',
        'uses' => 'Dashboard\DashboardController@dashboard'
    ]);  

    Route::resource('users','UserController'); 

   // more route definitions

});</pre>

<h3> Using chain method</h3>

<pre class="lang-php prettyprint prettyprinted" style="">
Route::get('/', function () {
        //
})->middleware(['TransactionHandler', 'second']);
</pre>

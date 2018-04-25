const staticAssets =[// To define all the static assest which is all the files in the app stating from the root file
    './',
    './app.js',
    './styles.css'

];
/* makes your assets cached but cannot be used till you tell 
it to be used using the fetch event listener*/
self.addEventListener('install', async event=>{
    const cache = await caches.open('news-static');//Opens a child for the cache
    cache.addAll(staticAssets);// add all the static assets to the child cache
});

self.addEventListener('fetch', event=>{
    const req = event.request; // Gets any request the app has
    const url = new URL(req.url);// keep the request url in url

    if(url.origin == location.origin){ //check if the request is for our website or another website
    event.respondWith(cacheFirst(req));// if it is then use cache first approach
}else
{ 
    event.respondWith(networkFirst(req));// else use a network first approach
}
});
// we have to define the cahed first function




async function cacheFirst(req){
    //check if we have a cached response
    const respondCache = await caches.match(req);
    return respondCache || fetch(req);
}

//We have to define the network first approch here
async function networkFirst(req){
    const cache = await caches.open('news-dynamic');
    try {
    const res = await fetch(req);
    cache.put(req, res.clone());
    return res;
    } 
    catch (error) {
        return await caches.match(req);
    }
}


const sourceSelector = document.querySelector('#sourceSelector');
const defaultSource = "abc-news";
const apikey = 'b5a07829c1a74fe5bcd506d82df71486';
const main = document.querySelector('main'); //This is for the main part of the index


//--------------start the windoow function------------------------------------
window.addEventListener('load', async e => { // adds an event listener to the window for loading so one the window is lo
    updateNews(); //calling a fuction to update the news
    await updateSources(); //the awaits here palse the async function here for the source to update the resumes the function
    sourceSelector.value = defaultSource; //Assigns the slector value to a default value

    sourceSelector.addEventListener('change', e => {// adds an event listner to the select box in the index page to dectect any change
        updateNews(e.target.value);
    });
    //------------------------------Ends the widow function-----------------------------

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
                .register('./sw.js')
                .then(function () {
                    console.log('Service Worker Registered');
                });
    }
});

async function updateSources() {
    const res = await fetch(`https://newsapi.org/v2/sources?apiKey=${apikey}`);
    const json = await res.json();


    sourceSelector.innerHTML = json.sources.map(src => `<option value="${src.id}"> ${src.name} </option>`).join('\n');
    $(document).ready(function () {
        $('#sourceSelector').material_select();
    });
}


async function updateNews(source = defaultSource) {
    const res = await fetch(`https://newsapi.org/v2/top-headlines?sources=${source}&apiKey=${apikey}`);
    const json = await res.json();
    main.innerHTML = json.articles.map(createArticle).join('\n');
}

function createArticle(article) {
return`
<section>
    <div class="row">
        <div class="col s12">
            <div class="col s1">
            </div>
            <div class="col s10 m10 ">
                <div class="card card-panel hoverable">
                    <div class="card-image">
                        <div class="article">
                            <img class="materialboxed" width="70%" src="${article.urlToImage}">
                        </div>
                        <div class="card-content">
                            <p>${article.description}</p>
                        </div>
                        <div class="card-action">
                            <a href="${article.url}">${article.title}</a>
                            <div class="valign-wrapper"> 
                                <a class="twitter-share-button "
                                   href="https://twitter.com/intent/tweet?text=${article.url}">
                                    <img src="twitter.png" class="images"></a>
                                <div id="fb-root">
                                    <div class="fb-share-button" data-href="${article.url}" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=${article.url}" class="fb-xfbml-parse-ignore">
                                            <img src="facebook.png" class="images"></a></div>

                                </div>
                                <div class="g-plus" data-action="share" data-height="15" data-href="${article.url}"></div>
                                <a href="https://plus.google.com/share?url=${article.url}" onclick="javascript:window.open(this.href,
                                  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                               <img src="https://www.gstatic.com/images/icons/gplus-64.png" class="gimage" alt="Share on Google+"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>`;

}

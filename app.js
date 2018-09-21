const countrySelector = document.querySelector('#countrySelector');
const categorySelector = document.querySelector('#categorySelector');
const defaultcountry = "ng";
const defaultcategory = "";
const apikey = 'b5a07829c1a74fe5bcd506d82df71486';
const main = document.querySelector('main'); //This is for the main part of the index


//--------------start the window function------------------------------------
window.addEventListener('load', async e => { // adds an event listener to the window for loading so one the window is load
    updateNews(); //calling a function to update the news
    await updateCountries(); //the awaits here pulse the async function here for the country to update the resumes the function
    countrySelector.value = defaultcountry; //Assigns the selector value to a default value

    await updateCategories(); //the awaits here pulse the async function here for the country to update the resumes the function
    categorySelector.value = defaultcategory; //Assigns the selector value to a default value

    countrySelector.addEventListener('change', e => {// adds an event listener to the select box in the index page to dectect any change
        updateNews(e.target.value,categorySelector.value);
    });


    categorySelector.addEventListener('change', e => {// adds an event listener to the select box in the index page to dectect any change
        updateNews(countrySelector.value,e.target.value);

    });
    //------------------------------Ends the window function-----------------------------

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('./sw.js')
            .then(function () {
                console.log('Service Worker Registered');
            });
    }
});


async function updateCategories() {
    categorySelector.innerHTML= `
<option value=""> General</option>
<option value="business"> Business</option>
<option value="entertainment"> Entertainment</option>
<option value="health"> Health </option>
<option value="science"> Science </option>
<option value="sport"> Sport</option>
<option value="technology"> Technology</option>`
    $(document).ready(function () {
        $('#categorySelector').material_select();
    });
}

async function updateCountries() {
    countrySelector.innerHTML = `
<option value="ar"> Argentina</option>
<option value="au"> Australia</option>
<option value="at"> Austria </option>
<option value="be"> Belgium </option>
<option value="br"> Brazil</option>
<option value="bg"> Bulgaria</option>
<option value="ca"> Canada</option>
<option value="cn"> China</option>
<option value="co"> Colombia</option>
<option value="cu"> Cuba</option>
<option value="cz"> Czech Republic</option>
<option value="eg"> Egypt</option>
<option value="fr"> France</option>
<option value="de"> Germany</option>
<option value="gr"> Greece</option>
<option value="hk"> Hong Kong</option>
<option value="hu"> Hungary</option>
<option value="in"> India</option>
<option value="id"> Indonesia</option>
<option value="ie"> Ireland</option>
<option value="il"> Israel</option>
<option value="it"> Italy</option>
<option value="jp"> Japan</option>
<option value="lv"> Latvia</option>
<option value="lt"> Lithuania</option>
<option value="my"> Malaysia</option>
<option value="mx"> Mexico</option>
<option value="ma"> Morocco</option>
<option value="nl"> Netherlands</option>
<option value="nz"> New Zealand</option>
<option value="ng"> Nigeria</option>
<option value="no"> Norway</option>
<option value="ph"> Philippines</option>
<option value="pl"> Poland</option>
<option value="pt"> Portugal</option>
<option value="ro"> Romania</option>
<option value="ru"> Russia</option>
<option value="sa"> Saudi Arabia</option>
<option value="rs"> Serbia</option>
<option value="sg"> Singapore</option>
<option value="sk"> Slovakia</option>
<option value="si"> Slovenia</option>
<option value="za"> South Africa </option>
<option value="kr"> South Korea</option>
<option value="se"> Sweden</option>
<option value="ch"> Switzerland</option>
<option value="tw"> Taiwan</option>
<option value="th"> Thailand</option>
<option value="tr"> Turkey</option>
<option value="ae"> UAE</option>
<option value="ua"> Ukraine</option>
<option value="gb"> United Kingdom</option>
<option value="us"> United States</option>
<option value="ve"> Venuzuela</option> `;
    $(document).ready(function () {
        $('#countrySelector').material_select();
    });
}


async function updateNews(country = defaultcountry, category = defaultcategory) {
    const res = await fetch(`https://newsapi.org/v2/top-headlines?country=${country}&category=${category}&apiKey=${apikey}`);
    const json = await res.json();
    main.innerHTML = json.articles.map(createArticle).join('\n');
}

function createArticle(article) {
    return`
<section>

<div class="row">

 <div class="col s12">

 <div class="col s1"></div>

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
                <img src="twitter.png" class="images">
            </a>

            <div id="fb-root">
            <div class="fb-share-button" data-href="${article.url}" data-layout="button_count" data-size="small" data-mobile-iframe="true">
        
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=${article.url}" class="fb-xfbml-parse-ignore">
                    <img src="facebook.png" class="images">
                </a>
        
            </div>
            </div>

            <div class="g-plus" data-action="share" data-height="15" data-href="${article.url}"></div>

            <a href="https://plus.google.com/share?url=${article.url}" onclick="javascript:window.open(this.href,
              '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <img src="https://www.gstatic.com/images/icons/gplus-64.png" class="gimage" alt="Share on Google+"/>
            </a>
        </div>
        </div>
    </div>
</div>
</div>

</div>
</section>`;

}






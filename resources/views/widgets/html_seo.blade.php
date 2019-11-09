@if(isset($arrSeo) && isset($arrSeo['title_seo']))
	<title>{{$arrSeo['title_seo']}}</title>
@endif
@if(isset($arrSeo) && isset($arrSeo['description_seo']))
	<meta name='description' content="{{$arrSeo['description_seo']}}"/>
@endif
@if(isset($arrSeo) && isset($arrSeo['keyword_seo']))
	<meta name='keywords' content="{{$arrSeo['description_seo']}}"/>
@endif
<meta name="robots" content="index, follow, noodp"/>
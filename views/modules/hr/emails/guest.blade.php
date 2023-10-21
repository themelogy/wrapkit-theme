<html>
<body>
<p>Sayın {{ $application->present()->fullname }}</p>
<p>Başvuru formunuz tarafımıza ulaşmıştır. En kısa zamanda incelenerek görüşme yapmak için uygun görülmesi durumunda tarafınıza geri dönüş yapılacaktır.</p>
<hr>
<p>{{ setting('theme::company-name') }}</p>
<p>{{ setting('theme::address') }}</p>
</body>
</html>
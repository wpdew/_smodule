Tewmplate FAQ
<p>To use templates, we call a new instance of the _Template_Loader () class</p>
<pre>
&lt;?php<br/>$templates = new Your_nameplugin_Template_Loader();<br/>?&gt;
</pre>
<p>Template output:</p>
<pre>
&lt;?php $templates-&gt;get_template_part(&#39;faq&#39;, &#39;main&#39;); ?&gt;
</pre>
<p>Where 'faq', 'main' is the name of the faq-main.php template in the Template folder.</p>
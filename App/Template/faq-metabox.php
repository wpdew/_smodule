Metabox FAQ
<p>To use Metabox. We call a new instance of the class:</p>
<pre>
$my_meta = new AT_Meta_Box();
</pre>

<pre>
&lt;?php<br/>    settings_fields( &#39;conclgen_plugin_meta&#39; );<br/>    $my_meta = new AT_Meta_Box();<br/>?&gt;<br/>                       <br/>&lt;div class=&quot;form-group&quot;&gt;<br/>    &lt;?php                            <br/>    $field_text = array(<br/>        &#39;id&#39; =&gt; &#39;conclgen_plugin_meta[first_field_text]&#39;,<br/>        &#39;class&#39; =&gt; &#39;form-control&#39;,<br/>        &#39;style&#39;=&gt; &#39;&#39;,<br/>        &#39;name&#39; =&gt; &#39;Name fild text&#39;,<br/>        &#39;desc&#39; =&gt; &#39;Help Description fild text&#39;<br/>    );<br/>    $my_meta-&gt;show_field_text($field_text, $option3[&#39;first_field_text&#39;]); <br/>    ?&gt;<br/>&lt;/div&gt;
</pre>
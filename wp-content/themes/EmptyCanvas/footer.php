
	</div><!-- #container -->

	<div id="footer">		
		<ul id="footer-links">
		<li>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></li>
		<?php 
			wp_list_pages('title_li=&depth=1');
		?>
		</ul>
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php wp_footer() ?>

</body>
</html>
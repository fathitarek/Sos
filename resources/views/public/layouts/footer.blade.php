<footer class="footer1">
    <div class="container">

      @if(app()->getlocale() == 'en')
          <p class="copyright">
              © Copyright SOS - 2017
          </p>
          <p class="developedby">
              Designed and developed by Mortimer Harvey
          </p>
        @endif

        @if(app()->getlocale() == 'ar')
            <p class="developedby">
          		تم تصميمه وتطويره بواسطة مورتيمر هارفي
          	</p>
          	<p class="copyright">
          		© حقوق النشر محفوظة لدى SOS - ٢٠١٧
          	</p>
          @endif
    </div>
</footer>
<script type="text/javascript" src="/front/js/index.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>

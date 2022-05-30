
<script>
  $(document).ready(function () {
    $("#start").click(
      function () {
        $("#sormi").addClass("delete");
        $("#mainosteksti").addClass("delete");
      },
    );
    $("#start").hover(
      function () {
        $("#sormi").addClass("delete");
        $("#mainosteksti").addClass("delete");
      },
    );
  });
</script>

<style>
  .blink {
  animation: blinker 3s linear infinite;
  }
  @keyframes blinker {
    50% {
      opacity: 0;
    }
  }

</style>
  <div class="teksticontainer">
    <div id="sormi" class="sormi blink">☞</div>
    <div id="mainosteksti" class="mainosteksti blink">Kokeile tästä!</div>
  </div>
  <div class="center">
    <input id="level-one" type="checkbox"/>
    <div class="level" l="1">
      <div id="start" class="step start" r="0" c="0"></div>
      <div class="step" r="0" c="1"></div>
      <div class="step" r="1" c="1"></div>
      <div class="step" r="2" c="1"></div>
      <div class="step" r="3" c="1"></div>
      <div class="step" r="3" c="2"></div>
      <div class="step" r="3" c="3"></div>
      <div class="step" r="2" c="3"></div>
      <div class="step" r="2" c="4"></div>
      <div class="step" r="3" c="4"></div>
      <div class="step finish" r="4" c="4">
        <label class="goal" for="level-one"></label>
      </div>
    </div>
    <input id="level-two" type="checkbox"/>
    <div class="level">
      <div class="step start" r="4" c="4"></div>
      <div class="step" r="4" c="3"></div>
      <div class="step" r="4" c="2"></div>
      <div class="step" r="3" c="2"></div>
      <div class="step" r="3" c="1"></div>
      <div class="step" r="3" c="0"></div>
      <div class="step" r="4" c="0"></div>
      <div class="step" r="4" c="1"></div>
      <div class="step" r="3" c="1"></div>
      <div class="step" r="3" c="2"></div>
      <div class="step" r="3" c="3"></div>
      <div class="step" r="4" c="3"></div>
      <div class="step" r="4" c="2"></div>
      <div class="step" r="3" c="2"></div>
      <div class="step" r="3" c="1"></div>
      <div class="step" r="4" c="1"></div>
      <div class="step" r="4" c="0"></div>
      <div class="step" r="3" c="0"></div>
      <div class="step" r="2" c="0"></div>
      <div class="step" r="1" c="0"></div>
      <div class="step finish" r="1" c="1">
        <label class="goal" for="level-two"></label>
      </div>
    </div>
    <input id="level-three" type="checkbox"/>
    <div class="level">
      <div class="step start" r="1" c="1"></div>
      <div class="step" r="1" c="2"></div>
      <div class="step" r="1" c="3"></div>
      <div class="path">
        <div class="step" r="1" c="4"></div>
        <div class="step" r="0" c="4"></div>
        <div class="step" r="0" c="3"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="3" c="3"></div>
        <div class="step" r="4" c="3"></div>
        <div class="step" r="4" c="4"></div>
      </div>
      <div class="step" r="2" c="3"></div>
      <div class="step" r="3" c="3"></div>
      <div class="step" r="3" c="2"></div>
      <div class="step" r="3" c="1"></div>
      <div class="step" r="3" c="0"></div>
      <div class="step" r="2" c="0"></div>
      <div class="step" r="1" c="0"></div>
      <div class="step finish" r="0" c="0">
        <label class="goal" for="level-three"></label>
      </div>
    </div>
    <input id="level-four" type="checkbox"/>
    <div class="level">
      <div class="step start" r="0" c="0"></div>
      <div class="path">
        <div class="step" r="0" c="1"></div>
        <div class="step" r="0" c="2"></div>
        <div class="path">
          <div class="step" r="1" c="2"></div>
          <div class="step" r="2" c="2"></div>
          <div class="step" r="3" c="2"></div>
          <div class="path">
            <div class="step" r="3" c="3"></div>
            <div class="step" r="2" c="3"></div>
            <div class="step" r="1" c="3"></div>
            <div class="step" r="1" c="4"></div>
            <div class="step" r="2" c="4"></div>
          </div>
          <div class="step" r="3" c="1"></div>
          <div class="step" r="3" c="0"></div>
          <div class="step" r="2" c="0"></div>
          <div class="step" r="2" c="1"></div>
          <div class="step" r="2" c="2"></div>
          <div class="step" r="1" c="2"></div>
          <div class="step" r="1" c="3"></div>
          <div class="step" r="0" c="3"></div>
          <div class="step" r="0" c="4"></div>
          <div class="step" r="1" c="4"></div>
          <div class="step" r="2" c="4"></div>
          <div class="step" r="3" c="4"></div>
        </div>
        <div class="step" r="0" c="3"></div>
        <div class="step" r="0" c="4"></div>
        <div class="step" r="1" c="4"></div>
        <div class="path">
          <div class="step" r="1" c="3"></div>
          <div class="step" r="2" c="3"></div>
          <div class="step" r="2" c="2"></div>
          <div class="step" r="2" c="1"></div>
          <div class="step" r="2" c="0"></div>
          <div class="step" r="1" c="0"> </div>
        </div>
        <div class="step" r="2" c="4"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="2" c="1"></div>
        <div class="step" r="2" c="0"></div>
        <div class="step" r="3" c="0"></div>
        <div class="step" r="4" c="0"></div>
        <div class="step" r="4" c="1"></div>
        <div class="step" r="4" c="2"></div>
        <div class="step" r="3" c="2"></div>
      </div>
      <div class="step" r="1" c="0"></div>
      <div class="path">
        <div class="step" r="1" c="1"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
      </div>
      <div class="step" r="2" c="0"></div>
      <div class="step" r="3" c="0"></div>
      <div class="step" r="4" c="0"></div>
      <div class="step" r="4" c="1"></div>
      <div class="step" r="4" c="2"></div>
      <div class="step" r="3" c="2"></div>
      <div class="step" r="2" c="2"></div>
      <div class="path">
        <div class="step" r="2" c="1"></div>
        <div class="step" r="2" c="0"></div>
        <div class="step" r="3" c="0"></div>
        <div class="step" r="4" c="0"></div>
        <div class="step" r="4" c="1"></div>
        <div class="step" r="4" c="2"></div>
      </div>
      <div class="step" r="1" c="2"></div>
      <div class="step" r="0" c="2"></div>
      <div class="step" r="0" c="3"></div>
      <div class="step" r="1" c="3"></div>
      <div class="step" r="1" c="4"></div>
      <div class="step" r="0" c="4"></div>
      <div class="step" r="0" c="3"></div>
      <div class="step" r="1" c="3"></div>
      <div class="step" r="2" c="3"></div>
      <div class="step" r="2" c="2"></div>
      <div class="step" r="3" c="2"></div>
      <div class="step finish" r="4" c="4">
        <label class="goal" for="level-four"></label>
      </div>
    </div>
    <input id="level-five" type="checkbox"/>
    <div class="level">
      <div class="step start" r="0" c="0"></div>
      <div class="path">
        <div class="step" r="0" c="1"></div>
        <div class="step" r="0" c="2"></div>
        <div class="path">
          <div class="step" r="1" c="2"></div>
          <div class="step" r="2" c="2"></div>
          <div class="step" r="3" c="2"></div>
          <div class="path">
            <div class="step" r="2" c="2"></div>
            <div class="step" r="2" c="3"></div>
            <div class="step" r="1" c="3"></div>
            <div class="step" r="1" c="4"></div>
            <div class="step" r="2" c="4"></div>
          </div>
          <div class="step" r="3" c="1"></div>
          <div class="step" r="3" c="0"></div>
          <div class="step" r="2" c="0"></div>
          <div class="step" r="2" c="1"></div>
          <div class="step" r="2" c="2"></div>
          <div class="step" r="1" c="2"></div>
          <div class="step" r="1" c="3"></div>
          <div class="step" r="0" c="3"></div>
          <div class="step" r="0" c="4"></div>
          <div class="step" r="1" c="4"></div>
          <div class="step" r="2" c="4"></div>
        </div>
        <div class="step" r="0" c="3"></div>
        <div class="step" r="0" c="4"></div>
        <div class="step" r="1" c="4"></div>
        <div class="path">
          <div class="step" r="1" c="3"></div>
          <div class="step" r="2" c="3"></div>
          <div class="step" r="2" c="2"></div>
          <div class="step" r="2" c="1"></div>
          <div class="step" r="2" c="0"></div>
          <div class="step" r="1" c="0"> </div>
        </div>
        <div class="step" r="2" c="4"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="3" c="2"></div>
        <div class="step" r="3" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="3" c="2"></div>
        <div class="step" r="3" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="3" c="2"></div>
        <div class="step" r="3" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="2" c="1"></div>
        <div class="step" r="2" c="0"></div>
        <div class="step" r="3" c="0"></div>
        <div class="step" r="4" c="0"></div>
        <div class="step" r="4" c="1"></div>
        <div class="step" r="4" c="2"></div>
        <div class="step" r="3" c="2"></div>
      </div>
      <div class="step" r="1" c="0"></div>
      <div class="path">
        <div class="step" r="1" c="1"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
        <div class="step" r="1" c="3"></div>
        <div class="step" r="2" c="3"></div>
        <div class="step" r="2" c="2"></div>
        <div class="step" r="1" c="2"></div>
      </div>
      <div class="step" r="2" c="0"></div>
      <div class="step" r="3" c="0"></div>
      <div class="step" r="4" c="0"></div>
      <div class="step" r="4" c="1"></div>
      <div class="step" r="4" c="2"></div>
      <div class="step" r="3" c="2"></div>
      <div class="step" r="2" c="2"></div>
      <div class="path">
        <div class="step" r="2" c="1"></div>
        <div class="step" r="2" c="0"></div>
        <div class="step" r="3" c="0"></div>
        <div class="step" r="4" c="0"></div>
        <div class="step" r="4" c="1"></div>
        <div class="step" r="4" c="2"></div>
      </div>
      <div class="step" r="1" c="2"></div>
      <div class="step" r="0" c="2"></div>
      <div class="step" r="0" c="3"></div>
      <div class="step" r="1" c="3"></div>
      <div class="step" r="1" c="4"></div>
      <div class="step" r="0" c="4"></div>
      <div class="step" r="0" c="3"></div>
      <div class="step" r="1" c="3"></div>
      <div class="step" r="2" c="3"></div>
      <div class="step" r="2" c="2"></div>
      <div class="step" r="2" c="3"></div>
      <div class="step" r="2" c="4"></div>
      <div class="step" r="1" c="4"></div>
      <div class="step" r="0" c="4"></div>
      <div class="step" r="0" c="3"></div>
      <div class="step" r="0" c="2"></div>
      <div class="step" r="0" c="1"></div>
      <div class="step" r="0" c="2"></div>
      <div class="step" r="0" c="3"></div>
      <div class="step" r="0" c="4"></div>
      <div class="step" r="1" c="4"></div>
      <div class="step" r="2" c="4"></div>
      <div class="step" r="2" c="3"></div>
      <div class="step" r="2" c="2"></div>
      <div class="step" r="2" c="1"></div>
      <div class="step" r="2" c="0"></div>
      <div class="step" r="2" c="1"></div>
      <div class="step" r="2" c="2"></div>
      <div class="step" r="2" c="3"></div>
      <div class="step" r="2" c="4"></div>
      <div class="step" r="2" c="3"></div>
      <div class="step" r="2" c="2"></div>
      <div class="step" r="2" c="1"></div>
      <div class="step" r="2" c="0"></div>
      <div class="step" r="3" c="0"></div>
      <div class="step" r="3" c="1"></div>
      <div class="step" r="3" c="2"></div>
      <div class="step" r="3" c="1"></div>
      <div class="step" r="3" c="0"></div>
      <div class="step" r="4" c="0"></div>
      <div class="step" r="4" c="1"></div>
      <div class="step" r="4" c="2"></div>
      <div class="step" r="3" c="2"></div>
      <div class="step" r="3" c="3"></div>
      <div class="step" r="2" c="3"></div>
      <div class="step" r="2" c="4"></div>
      <div class="step" r="3" c="4"></div>
      <div class="step finish" r="4" c="4">
        <label class="goal" for="level-five"></label>
      </div>
    </div>
    <input id="finsh" type="checkbox"/>
    <div class="level">
      <div class="voitto">
        <p>Onnittelut pelin läpäisemisestä!</p>
        <h1>VIIHDEMAGIA</h1>
      </div>
    </div>
  </div>
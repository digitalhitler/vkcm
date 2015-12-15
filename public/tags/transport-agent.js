<transport-agent>
  <ul>
    <li each={settings}>
      {field} is {value}
    </li>
  </ul>
  <form onsubmit={saveNew}>
    <input type="text" onkeyup="{updateElem}" class="input" value="{settings[0].value}" id="newSettingName" />
  </form>

  <script>
  this.settings = [
    { field: 'coreLoaded', type: 'boolean', value: true },
    { field: 'databaseReady', type: 'boolean', value: 1111 }
  ];

  this.updateElem = function() {
    console.log('keypress');
    //this.update({ settings })
  }

  this.on('update', function() {
    // allows recalculation of context data before the update
    console.log('updated');
  })

  this.saveNew = function() {
    console.log(e);
  };
  </script>
</transport-agent>
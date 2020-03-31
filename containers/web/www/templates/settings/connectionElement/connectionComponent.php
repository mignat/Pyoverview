<?php


class connectionComponent {
    public $connectionName;
    public $connectionCheck;
    public $connectionOptions = array();
    private $optionButtons;
    private $serviceName;

    function __construct($conName,$healthCheck,$serviceName)
    {
        $this->connectionName = $conName;
        $this->connectionCheck = $healthCheck;
        $this->serviceName = $serviceName;
    }

    function addOptionButton($optionName,$optionID,$buttonType){
        $this->connectionOptions[] = "<button class='btn btn-primary {$buttonType}' id='option-{$this->connectionName}-{$optionID}'>{$optionName}</button>";
        $this->optionButtons = implode("", $this->connectionOptions);


    }

    function render(){
        echo <<<EOT
        <script>
        let {$this->connectionName}_status;
        function service(operation,service) {
              $.ajax({
              type: "GET",
              url: "../../lib/be_connections.php",
              data: `operation=` + operation + `&service=` + service
        });
            console.log("Running " + operation + " operation on " + service);
        };
        window.setInterval(function(){
            $.get('{$this->connectionCheck}',function(data) {
              {$this->connectionName}_status = data;
              
              if (/^Error.*|^inactive.*/.test({$this->connectionName}_status)) {
                  var service_button = $('#service_{$this->connectionName}');
                  var status_icon = $('#status_icon_{$this->connectionName}');
                  service_button.removeClass("btn-danger");
                  service_button.addClass("btn-success");
                  service_button.text("Start");
                  service_button.attr(`onclick`,`service('start','{$this->serviceName}')`);
                  status_icon.attr('src','../../../images/cancel-24px.svg');
                  
              } else {
                  var service_button = $('#service_{$this->connectionName}');
                  var status_icon = $('#status_icon_{$this->connectionName}');
                  service_button.removeClass("btn-success");
                  service_button.addClass("btn-danger");
                  service_button.text("Stop");
                  service_button.attr(`onclick`,`service('stop','{$this->serviceName}')`);
                  status_icon.attr('src','../../../images/check_circle-24px.svg');
              }
              
            });
        }, 1000);
    </script>
       <div class="panel-group shadow-lg menu_heading" id="accordion-{$this->connectionName}">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title container-fluid">
        <div class="row">
        <div class="col-md-2">
        <img class="status_icon" style="padding-right: 10px;" id="status_icon_{$this->connectionName}"  src="../../../images/check_circle-24px.svg">
        </div>
        <div class="col-md-8">
            <div class="row" style="margin-bottom: 20px">
            <a style= 'font-size: 24px;' data-toggle="collapse" data-parent="#accordion" href="#collapse-{$this->connectionName}">{$this->connectionName}</a>
            </div>
            <div class="row btn-group" role="group">
            <button class='btn btn-primary btn-danger' id='service_{$this->connectionName}'>Stop</button>
           {$this->optionButtons}
</div>
        </div>
        <div class="col-md-2 details">
        <p  id="activeconnections-{$this->connectionName}">Active Connections: 0</p>
        <p  id="gateway-{$this->connectionName}">Gateway: 192.168.88.1</p>
</div>
</div>
      </div>
    </div>
    <div id="collapse-{$this->connectionName}" class="panel-collapse collapse in">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
</div>
EOT;

    }
}
?>


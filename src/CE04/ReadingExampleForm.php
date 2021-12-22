<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Captain Maker</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <form
          class="form-group"
          action="ReadingExampleResult.php"
          method="post"
        >
          <fieldset>
            <!-- Form Name -->
            <legend><h3>Random Captain Generator</h3></legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-8 control-label" for="CapName"
                >Captain Name</label
              >
              <div class="col-md-8">
                <input
                  id="CapName"
                  name="CapName"
                  type="text"
                  placeholder="Kirk"
                  class="form-control input-md"
                  name="CapName"
                />
                <span class="help-block"
                  >This is the name your Captain will go by</span
                >
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-8 control-label" for="CapAge">Age</label>
              <div class="col-md-8">
                <input
                  id="CapAge"
                  name="CapAge"
                  type="number"
                  min="18"
                  max="36"
                  placeholder="22"
                  class="form-control input-md"
                  name="CapAge"
                />
                <span class="help-block"
                  >The age should be between 19 and 35</span
                >
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-8 control-label" for="ShipName"
                >Ship Name</label
              >
              <div class="col-md-8">
                <input
                  id="ShipName"
                  name="ShipName"
                  type="text"
                  placeholder="Serinity"
                  class="form-control input-md"
                  name="ShipName"
                />
                <span class="help-block"
                  >This is the name your ship will use</span
                >
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8">
                <input
                  id="Submit"
                  name="Submit"
                  type="submit"
                  class="form-control input-group-btn"
                  name="Submit"
                />
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>

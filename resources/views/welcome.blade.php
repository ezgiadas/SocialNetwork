<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>test</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <body>
        <div class="row">
          <div class="col-md-offset-2">
            <h3>Create a Group</h3>
              <form action="{{ route('createGroup')}}" method="post">

                    <!-- <div class="form-group">
                      <label for="group_id">Your Group_id</label>
                      <input type="form-control" type="text" name="group_id" id='group_id'>
                    </div> -->

                    <div class="form-group">
                      <label for="group_name">Your group_name</label>
                      <input type="form-control" type="text" name="group_name" id='group_name'>
                    </div>

                    <div class="form-group">
                      <label for="group_topic">Your group_topic</label>
                      <input type="form-control" type="text" name="group_topic" id='group_topic'>
                    </div>

                    <div class="form-group">
                      <label for="group_private">Your Group should be private?</label>
                      <input type="form-control" type="text" name="group_private" id='group_private'>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="_token" value="{{ Session::token()}}">

              </form>

          </div>

        </div>
    </body>
</html>

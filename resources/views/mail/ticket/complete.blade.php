<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('notification/css/foundation-emails.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('notification/css/foundation.css') }} ">
  </head>
    
  <body>
    <table class="body" data-made-with-foundation="">
      <tr>
        <td class="float-center" align="center" valign="top">
          <center data-parsed="">
            <table align="center" class="container body-drip float-center">
              <tbody class="tbody-custom">
                <tr>
                  <td>
                    <table class="spacer">
                      <tbody>
                        <tr>
                          <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                        </tr>
                      </tbody>
                    </table>
                    <center data-parsed=""> <img src="{{ asset('app-assets/images/custom-images/ticket-completed.png') }}" alt="" align="center" class="float-center"> 
                    </center>
                    <table class="spacer">
                      <tbody>
                        <tr>
                          <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="row">
                      <tbody>
                        <tr>
                          <th class="small-12 large-12 columns first last">
                            <table>
                              <tr>
                                <th>
                                  <h4 class="text-center">Project Name</h4>
                                </th>
                                <th class="expander"></th>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                    <hr>
                    <table class="row">
                      <tbody>
                        <tr>
                          <th class="small-12 large-12 columns first last">
                            <table>
                              <tr>
                                <th>
                                  <div>
                                  <p class="text-center"> 

                                    @foreach ($tickets as $element)
                                    
                                      @if (Auth::user()->email === $element->email)
                                         <p class="text-center">{{ $element->description }}</p>
                                      @endif
                                        
                                    @endforeach

                                  </p>
                                  <br><br>
                                </div>
                                  <center data-parsed="">
                                    <table class="button success float-center">
                                      <tr>
                                        <td>
                                          <table>
                                            <tr>
                                              <div><td class="btn-custom"><a href="{{ route('tickets.tickets.index').'?'.encrypt(Auth::check()) }}">Get smarter now</a></td></div>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                  </center>
                                </th>
                                <th class="expander"></th>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                    <table class="row collapsed footer">
                      <tbody>
                        <tr>
                          <th class="small-12 large-12 columns first last">
                            <table>
                              <tr>
                                <th>
                                  <table class="spacer">
                                    <tbody>
                                      <tr>
                                        <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                                      </tr>
                                    </tbody>
                             
                                <th class="expander"></th>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </center>
        </td>
      </tr>
    </table>
  </body>

</html>
<div style="margin:0; padding:0; background-color:#f2efe7; font-family: Arial, Tahoma, sans-serif;">

  <!-- Outer wrapper -->
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f2efe7; padding:32px 0;">
    <tr>
      <td align="center">

        <!-- Email card -->
        <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.06);">

          <!-- Header: Logo + Platform name -->
          <tr>
            <td style="background-color:#ffffff; padding:28px 32px; border-bottom:1px solid #eeeeee;" align="right">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="right">
                    <table role="presentation" cellpadding="0" cellspacing="0">
                      <tr>
                        <td style="vertical-align:middle; padding-left:10px;">
                          <!-- شعار المنصة: استبدل الرابط بلوجو المنصة -->
                      {{-- <img src="https://via.placeholder.com/48x48.png?text=EA" width="48" height="48" alt="Education App Logo" style="display:block; border-radius:10px;"> --}}
                        </td>
                        <td style="vertical-align:middle;">
                          <span style="font-size:24px; font-weight:bold; color:#2b2ee0;">Education App</span>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Greeting -->
          <tr>
            <td style="padding:32px 32px 0 32px;" align="right">
              <p style="margin:0; font-size:16px; color:#333333;">
                 <strong> Hello {{$teacher->name}}</strong>،
              </p>
            </td>
          </tr>

          <!-- Headline / نوع الإيميل -->
          <tr>
            <td style="padding:12px 32px 0 32px;" align="right">
              <h1 style="margin:0; font-size:26px; color:#2b2ee0; font-weight:bold;">
                {{ $details }}
              </h1>
            </td>
          </tr>



          <!-- Data card (اختياري لعرض معلومة أو رقم) -->
          <tr>
            <td style="padding:24px 32px 0 32px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f6f5fb; border-radius:10px;">
                <tr>
                  <td style="padding:20px 24px;" align="right">
                    <p style="margin:0 0 6px 0; font-size:13px; color:#7a7a8c;">System</p>
                    <p style="margin:0; font-size:20px; font-weight:bold; color:#1a1a4d;">{{$content}}</p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- CTA Button -->
          {{-- <tr>
            <td style="padding:28px 32px 8px 32px;" align="center">
              <table role="presentation" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="background-color:#2b2ee0; border-radius:8px;">
                    <a href="" target="_blank" style="display:inline-block; padding:14px 36px; font-size:15px; font-weight:bold; color:#ffffff; text-decoration:none;">

                    </a>
                  </td>
                </tr>
              </table>
            </td>
          </tr> --}}

          <!-- Footer -->
          <tr>
            <td style="padding:32px; border-top:1px solid #eeeeee; margin-top:24px;" align="center">
              <p style="margin:0 0 6px 0; font-size:12px; color:#999999;">
                Education App — منصتك التعليمية المتكاملة
              </p>
              <p style="margin:0; font-size:12px; color:#bbbbbb;">
                If You Do Not Expect This Email Just Ignore It
              </p>
            </td>
          </tr>

        </table>
        <!-- End email card -->

      </td>
    </tr>
  </table>

</div>

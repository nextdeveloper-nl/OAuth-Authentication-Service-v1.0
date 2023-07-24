<template>
  <div class="main-container min-h-screen text-black dark:text-white-dark">
    <!-- start main content section -->
    <div class="flex min-h-screen">
      <div class="relative flex w-full items-center justify-center lg:w-2/2">
        <div class="max-w-[480px] p-5 md:p-10">
          <Transition
            type="animation"
            enter-active-class="animate__animated animate__tada"
            leave-active-class="animate__animated animate__bounceOutRight"
          >
            <div class="pt-6" id="emailSection">
              <h2 class="mb-3 text-3xl font-bold">Sign In or Register</h2>
              <input type="hidden" v-model="csrf" />
              <div>
                <input
                  id="email"
                  type="email"
                  class="form-input"
                  v-model="data.email"
                  placeholder="Enter Email"
                />
              </div>
              <button class="btn btn-primary w-full mt-4" @click="getLogins">
                SIGN IN
              </button>

              <div
                class="relative my-7 h-5 text-center before:absolute before:inset-0 before:m-auto before:h-[1px] before:w-full before:bg-[#ebedf2] dark:before:bg-[#253b5c]"
              >
                <div
                  class="relative z-[1] inline-block bg-[#fafafa] px-2 font-bold text-white-dark dark:bg-[#060818]"
                >
                  <span>OR</span>
                </div>
              </div>
              <ul class="mb-5 flex justify-center gap-2 sm:gap-5">
                <li>
                  <button
                    type="button"
                    class="btn flex gap-1 bg-white-dark/30 text-black shadow-none hover:bg-white dark:border-[#253b5c] dark:bg-transparent dark:text-white dark:hover:bg-[#1b2e4b] sm:gap-2"
                  >
                    <svg
                      class="h-5 w-5 sm:h-6 sm:w-6 shrink-0"
                      viewBox="0 0 256 193"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      preserveAspectRatio="xMidYMid"
                    >
                      <g>
                        <path
                          d="M58.1818182,192.049515 L58.1818182,93.1404244 L27.5066233,65.0770089 L0,49.5040608 L0,174.59497 C0,184.253152 7.82545455,192.049515 17.4545455,192.049515 L58.1818182,192.049515 Z"
                          fill="#4285F4"
                        ></path>
                        <path
                          d="M197.818182,192.049515 L238.545455,192.049515 C248.203636,192.049515 256,184.224061 256,174.59497 L256,49.5040608 L224.844415,67.3422767 L197.818182,93.1404244 L197.818182,192.049515 Z"
                          fill="#34A853"
                        ></path>
                        <polygon
                          fill="#EA4335"
                          points="58.1818182 93.1404244 54.0077618 54.4932827 58.1818182 17.5040608 128 69.8676972 197.818182 17.5040608 202.487488 52.4960089 197.818182 93.1404244 128 145.504061"
                        ></polygon>
                        <path
                          d="M197.818182,17.5040608 L197.818182,93.1404244 L256,49.5040608 L256,26.2313335 C256,4.64587897 231.36,-7.65957557 214.109091,5.28587897 L197.818182,17.5040608 Z"
                          fill="#FBBC04"
                        ></path>
                        <path
                          d="M0,49.5040608 L26.7588051,69.5731646 L58.1818182,93.1404244 L58.1818182,17.5040608 L41.8909091,5.28587897 C24.6109091,-7.65957557 0,4.64587897 0,26.2313335 L0,49.5040608 Z"
                          fill="#C5221F"
                        ></path>
                      </g>
                    </svg>
                    Google
                  </button>
                </li>
                <li>
                  <button
                    type="button"
                    class="btn flex gap-1 bg-white-dark/30 text-black shadow-none hover:bg-white dark:border-[#253b5c] dark:bg-transparent dark:text-white dark:hover:bg-[#1b2e4b] sm:gap-2"
                  >
                    <svg
                      class="h-5 w-5 sm:h-6 sm:w-6 shrink-0"
                      viewBox="0 0 256 250"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      preserveAspectRatio="xMidYMid"
                    >
                      <g>
                        <path
                          d="M128.00106,0 C57.3172926,0 0,57.3066942 0,128.00106 C0,184.555281 36.6761997,232.535542 87.534937,249.460899 C93.9320223,250.645779 96.280588,246.684165 96.280588,243.303333 C96.280588,240.251045 96.1618878,230.167899 96.106777,219.472176 C60.4967585,227.215235 52.9826207,204.369712 52.9826207,204.369712 C47.1599584,189.574598 38.770408,185.640538 38.770408,185.640538 C27.1568785,177.696113 39.6458206,177.859325 39.6458206,177.859325 C52.4993419,178.762293 59.267365,191.04987 59.267365,191.04987 C70.6837675,210.618423 89.2115753,204.961093 96.5158685,201.690482 C97.6647155,193.417512 100.981959,187.77078 104.642583,184.574357 C76.211799,181.33766 46.324819,170.362144 46.324819,121.315702 C46.324819,107.340889 51.3250588,95.9223682 59.5132437,86.9583937 C58.1842268,83.7344152 53.8029229,70.715562 60.7532354,53.0843636 C60.7532354,53.0843636 71.5019501,49.6441813 95.9626412,66.2049595 C106.172967,63.368876 117.123047,61.9465949 128.00106,61.8978432 C138.879073,61.9465949 149.837632,63.368876 160.067033,66.2049595 C184.49805,49.6441813 195.231926,53.0843636 195.231926,53.0843636 C202.199197,70.715562 197.815773,83.7344152 196.486756,86.9583937 C204.694018,95.9223682 209.660343,107.340889 209.660343,121.315702 C209.660343,170.478725 179.716133,181.303747 151.213281,184.472614 C155.80443,188.444828 159.895342,196.234518 159.895342,208.176593 C159.895342,225.303317 159.746968,239.087361 159.746968,243.303333 C159.746968,246.709601 162.05102,250.70089 168.53925,249.443941 C219.370432,232.499507 256,184.536204 256,128.00106 C256,57.3066942 198.691187,0 128.00106,0 Z M47.9405593,182.340212 C47.6586465,182.976105 46.6581745,183.166873 45.7467277,182.730227 C44.8183235,182.312656 44.2968914,181.445722 44.5978808,180.80771 C44.8734344,180.152739 45.876026,179.97045 46.8023103,180.409216 C47.7328342,180.826786 48.2627451,181.702199 47.9405593,182.340212 Z M54.2367892,187.958254 C53.6263318,188.524199 52.4329723,188.261363 51.6232682,187.366874 C50.7860088,186.474504 50.6291553,185.281144 51.2480912,184.70672 C51.8776254,184.140775 53.0349512,184.405731 53.8743302,185.298101 C54.7115892,186.201069 54.8748019,187.38595 54.2367892,187.958254 Z M58.5562413,195.146347 C57.7719732,195.691096 56.4895886,195.180261 55.6968417,194.042013 C54.9125733,192.903764 54.9125733,191.538713 55.713799,190.991845 C56.5086651,190.444977 57.7719732,190.936735 58.5753181,192.066505 C59.3574669,193.22383 59.3574669,194.58888 58.5562413,195.146347 Z M65.8613592,203.471174 C65.1597571,204.244846 63.6654083,204.03712 62.5716717,202.981538 C61.4524999,201.94927 61.1409122,200.484596 61.8446341,199.710926 C62.5547146,198.935137 64.0575422,199.15346 65.1597571,200.200564 C66.2704506,201.230712 66.6095936,202.705984 65.8613592,203.471174 Z M75.3025151,206.281542 C74.9930474,207.284134 73.553809,207.739857 72.1039724,207.313809 C70.6562556,206.875043 69.7087748,205.700761 70.0012857,204.687571 C70.302275,203.678621 71.7478721,203.20382 73.2083069,203.659543 C74.6539041,204.09619 75.6035048,205.261994 75.3025151,206.281542 Z M86.046947,207.473627 C86.0829806,208.529209 84.8535871,209.404622 83.3316829,209.4237 C81.8013,209.457614 80.563428,208.603398 80.5464708,207.564772 C80.5464708,206.498591 81.7483088,205.631657 83.2786917,205.606221 C84.8005962,205.576546 86.046947,206.424403 86.046947,207.473627 Z M96.6021471,207.069023 C96.7844366,208.099171 95.7267341,209.156872 94.215428,209.438785 C92.7295577,209.710099 91.3539086,209.074206 91.1652603,208.052538 C90.9808515,206.996955 92.0576306,205.939253 93.5413813,205.66582 C95.054807,205.402984 96.4092596,206.021919 96.6021471,207.069023 Z"
                          fill="currentColor"
                        ></path>
                      </g>
                    </svg>
                    Github
                  </button>
                </li>
                <li>
                  <button
                    type="button"
                    class="btn flex gap-1 bg-white-dark/30 text-black shadow-none hover:bg-white dark:border-[#253b5c] dark:bg-transparent dark:text-white dark:hover:bg-[#1b2e4b] sm:gap-2"
                  >
                    <svg
                      class="h-5 w-5 sm:h-6 sm:w-6 shrink-0"
                      viewBox="0 0 256 209"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      preserveAspectRatio="xMidYMid"
                    >
                      <g>
                        <path
                          d="M256,25.4500259 C246.580841,29.6272672 236.458451,32.4504868 225.834156,33.7202333 C236.678503,27.2198053 245.00583,16.9269929 248.927437,4.66307685 C238.779765,10.6812633 227.539325,15.0523376 215.57599,17.408298 C205.994835,7.2006971 192.34506,0.822 177.239197,0.822 C148.232605,0.822 124.716076,24.3375931 124.716076,53.3423116 C124.716076,57.4586875 125.181462,61.4673784 126.076652,65.3112644 C82.4258385,63.1210453 43.7257252,42.211429 17.821398,10.4359288 C13.3005011,18.1929938 10.710443,27.2151234 10.710443,36.8402889 C10.710443,55.061526 19.9835254,71.1374907 34.0762135,80.5557137 C25.4660961,80.2832239 17.3681846,77.9207088 10.2862577,73.9869292 C10.2825122,74.2060448 10.2825122,74.4260967 10.2825122,74.647085 C10.2825122,100.094453 28.3867003,121.322443 52.413563,126.14673 C48.0059695,127.347184 43.3661509,127.988612 38.5755734,127.988612 C35.1914554,127.988612 31.9009766,127.659938 28.694773,127.046602 C35.3777973,147.913145 54.7742053,163.097665 77.7569918,163.52185 C59.7820257,177.607983 37.1354036,186.004604 12.5289147,186.004604 C8.28987161,186.004604 4.10888474,185.75646 0,185.271409 C23.2431033,200.173139 50.8507261,208.867532 80.5109185,208.867532 C177.116529,208.867532 229.943977,128.836982 229.943977,59.4326002 C229.943977,57.1552968 229.893412,54.8901664 229.792282,52.6381454 C240.053257,45.2331635 248.958338,35.9825545 256,25.4500259"
                          fill="#55acee"
                        ></path>
                      </g>
                    </svg>
                    Twitter
                  </button>
                </li>
              </ul>
            </div>
          </Transition>
          <Transition
            v-if="data.loginSection"
            class="animate__animated animate__fadeIn animate__delay-0.5s"
          >
            <div class="" id="loginSection">
              <h2 class="mb-3 text-3xl font-bold">
                How do you want to login ?
              </h2>
              <div id="loginSelector" class="">
                <div
                  v-if="
                    data.loginMethodList.find(
                      (x) => x === 'login-with-password'
                    )
                  "
                  class="panel group flex items-center rounded-md p-2.5"
                  id="selectPassword"
                >
                  <div class="flex items-center">
                    <div class="h-9 w-9 ltr:mr-3 rtl:ml-3">
                      <div
                        class="grid h-9 w-9 place-content-center rounded-md bg-secondary-light text-secondary dark:bg-secondary dark:text-secondary-light"
                      >
                        <svg
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M14.2084 13.5521C16.3025 13.5521 18 11.8615 18 9.77606C18 7.6906 16.3025 6 14.2084 6C12.1144 6 10.4169 7.6906 10.4169 9.77606C10.4169 10.742 10.8578 11.4446 10.8578 11.4446L6.27264 16.011C6.0669 16.2159 5.77886 16.7486 6.27264 17.2404L6.8017 17.7673C7.00743 17.9429 7.52471 18.1888 7.94796 17.7673L8.56519 17.1526C9.18242 17.7673 9.88782 17.416 10.1523 17.0647C10.5932 16.45 10.0642 15.8353 10.0642 15.8353L10.2405 15.6597C11.087 16.5027 11.8277 16.011 12.0922 15.6597C12.5331 15.045 12.0922 14.4303 12.0922 14.4303C11.9159 14.079 11.5632 14.079 12.004 13.64L12.5331 13.113C12.9564 13.4643 13.8264 13.5521 14.2084 13.5521Z"
                            stroke="#1C274C"
                            stroke-width="1.5"
                            stroke-linejoin="round"
                          />
                          <path
                            opacity="0.5"
                            d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                            stroke="#1C274C"
                            stroke-width="1.5"
                          />
                        </svg>
                      </div>
                    </div>
                    <div class="flex-1">
                      <div class="flex font-semibold text-dark">
                        Login with Password
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  v-if="
                    data.loginMethodList.find((x) => x === 'one-time-email')
                  "
                  class="panel group flex items-center rounded-md p-2.5 mt-2"
                  id="selectPassword"
                >
                  <div class="flex items-center">
                    <div class="h-9 w-9 ltr:mr-3 rtl:ml-3">
                      <div
                        class="grid h-9 w-9 place-content-center rounded-md bg-secondary-light text-secondary dark:bg-secondary dark:text-secondary-light"
                      >
                        <svg
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            opacity="0.5"
                            d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                            stroke="#1C274C"
                            stroke-width="1.5"
                          />
                          <path
                            d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8"
                            stroke="#1C274C"
                            stroke-width="1.5"
                            stroke-linecap="round"
                          />
                        </svg>
                      </div>
                    </div>
                    <div class="flex-1">
                      <div class="flex font-semibold text-dark">
                        Email / One Time Password
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  v-if="
                    data.loginMethodList.find((x) => x === 'one-time-password')
                  "
                  class="panel group flex items-center rounded-md p-2.5 mt-2"
                  id="selectPassword"
                >
                  <div class="flex items-center">
                    <div class="h-9 w-9 ltr:mr-3 rtl:ml-3">
                      <div
                        class="grid h-9 w-9 place-content-center rounded-md bg-secondary-light text-secondary dark:bg-secondary dark:text-secondary-light"
                      >
                        <svg
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M4 10C4 6.22876 4 4.34315 5.17157 3.17157C6.34315 2 8.22876 2 12 2C15.7712 2 17.6569 2 18.8284 3.17157C20 4.34315 20 6.22876 20 10V14C20 17.7712 20 19.6569 18.8284 20.8284C17.6569 22 15.7712 22 12 22C8.22876 22 6.34315 22 5.17157 20.8284C4 19.6569 4 17.7712 4 14V10Z"
                            stroke="#1C274C"
                            stroke-width="1.5"
                          />
                          <path
                            opacity="0.5"
                            d="M15 5H9"
                            stroke="#1C274C"
                            stroke-width="1.5"
                            stroke-linecap="round"
                          />
                          <circle
                            opacity="0.5"
                            cx="12"
                            cy="17"
                            r="2"
                            stroke="#1C274C"
                            stroke-width="1.5"
                          />
                        </svg>
                      </div>
                    </div>
                    <div class="flex-1">
                      <div class="flex font-semibold text-dark">
                        SMS / One Time Password
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  v-if="data.loginMethodList.find((x) => x === 'qr')"
                  class="panel group flex items-center rounded-md p-2.5 mt-2"
                  id="selectPassword"
                >
                  <div class="flex items-center">
                    <div class="h-9 w-9 ltr:mr-3 rtl:ml-3">
                      <div
                        class="grid h-9 w-9 place-content-center rounded-md bg-secondary-light text-secondary dark:bg-secondary dark:text-secondary-light"
                      >
                        <svg
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M5.5 15.5C5.5 14.5572 5.5 14.0858 5.79289 13.7929C6.08579 13.5 6.55719 13.5 7.5 13.5H8.5C9.44281 13.5 9.91421 13.5 10.2071 13.7929C10.5 14.0858 10.5 14.5572 10.5 15.5V16.5C10.5 17.4428 10.5 17.9142 10.2071 18.2071C9.91421 18.5 9.44281 18.5 8.5 18.5C7.08579 18.5 6.37868 18.5 5.93934 18.0607C5.5 17.6213 5.5 16.9142 5.5 15.5Z"
                            stroke="#1C274C"
                            stroke-width="1.5"
                          />
                          <path
                            d="M5.5 8.5C5.5 7.08579 5.5 6.37868 5.93934 5.93934C6.37868 5.5 7.08579 5.5 8.5 5.5C9.44281 5.5 9.91421 5.5 10.2071 5.79289C10.5 6.08579 10.5 6.55719 10.5 7.5V8.5C10.5 9.44281 10.5 9.91421 10.2071 10.2071C9.91421 10.5 9.44281 10.5 8.5 10.5H7.5C6.55719 10.5 6.08579 10.5 5.79289 10.2071C5.5 9.91421 5.5 9.44281 5.5 8.5Z"
                            stroke="#1C274C"
                            stroke-width="1.5"
                          />
                          <path
                            d="M13.5 15.5C13.5 14.5572 13.5 14.0858 13.7929 13.7929C14.0858 13.5 14.5572 13.5 15.5 13.5H16.5C17.4428 13.5 17.9142 13.5 18.2071 13.7929C18.5 14.0858 18.5 14.5572 18.5 15.5C18.5 16.9142 18.5 17.6213 18.0607 18.0607C17.6213 18.5 16.9142 18.5 15.5 18.5C14.5572 18.5 14.0858 18.5 13.7929 18.2071C13.5 17.9142 13.5 17.4428 13.5 16.5V15.5Z"
                            stroke="#1C274C"
                            stroke-width="1.5"
                          />
                          <path
                            d="M13.5 7.5C13.5 6.55719 13.5 6.08579 13.7929 5.79289C14.0858 5.5 14.5572 5.5 15.5 5.5C16.9142 5.5 17.6213 5.5 18.0607 5.93934C18.5 6.37868 18.5 7.08579 18.5 8.5C18.5 9.44281 18.5 9.91421 18.2071 10.2071C17.9142 10.5 17.4428 10.5 16.5 10.5H15.5C14.5572 10.5 14.0858 10.5 13.7929 10.2071C13.5 9.91421 13.5 9.44281 13.5 8.5V7.5Z"
                            stroke="#1C274C"
                            stroke-width="1.5"
                          />
                          <path
                            opacity="0.5"
                            d="M22 14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22"
                            stroke="#1C274C"
                            stroke-width="1.5"
                            stroke-linecap="round"
                          />
                          <path
                            opacity="0.5"
                            d="M10 22C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14"
                            stroke="#1C274C"
                            stroke-width="1.5"
                            stroke-linecap="round"
                          />
                          <path
                            opacity="0.5"
                            d="M10 2C6.22876 2 4.34315 2 3.17157 3.17157C2 4.34315 2 6.22876 2 10"
                            stroke="#1C274C"
                            stroke-width="1.5"
                            stroke-linecap="round"
                          />
                          <path
                            opacity="0.5"
                            d="M14 2C17.7712 2 19.6569 2 20.8284 3.17157C22 4.34315 22 6.22876 22 10"
                            stroke="#1C274C"
                            stroke-width="1.5"
                            stroke-linecap="round"
                          />
                        </svg>
                      </div>
                    </div>
                    <div class="flex-1">
                      <div class="flex font-semibold text-dark">QR</div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="loginOneTimeEmail" class="hidden">
                <label>One time password</label>
                <div>
                  <input
                    id="ote1"
                    type="text"
                    class="form-input w-11"
                    v-model="ote1"
                  />
                  <input
                    id="ote1"
                    type="text"
                    class="form-input w-11 ml-2"
                    v-model="ote1"
                  />
                  <input
                    id="ote1"
                    type="text"
                    class="form-input w-11 ml-2"
                    v-model="ote1"
                  />
                  <input
                    id="ote1"
                    type="text"
                    class="form-input w-11 ml-2"
                    v-model="ote1"
                  />
                  <input
                    id="ote1"
                    type="text"
                    class="form-input w-11 ml-2"
                    v-model="ote1"
                  />
                  <input
                    id="ote1"
                    type="text"
                    class="form-input w-11 ml-2"
                    v-model="ote1"
                  />
                </div>
                <button class="btn btn-primary w-full mt-4" @click="getLogins">
                  Login
                </button>
              </div>
              <div id="loginPassword" class="pt-4 hidden">
                <input
                  id="ote1"
                  type="password"
                  class="form-input"
                  v-model="password"
                  placeholder="Enter password"
                />
                <button class="btn btn-primary w-full mt-4" @click="getLogins">
                  Login
                </button>
              </div>
            </div>
          </Transition>
        </div>
      </div>
    </div>
    <!-- end main content section -->
  </div>
</template>
<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

onMounted(async () => {
  getCsrf();
});

const data = ref({
  emailSection: true,
  loginSection: false,
  token: "",
  model: {
    email: "",
  },
  loginMethodList: null,
});

async function getCsrf() {
  await axios.get("/security/csrf").then((res) => {
    data.value.token = res.data;
  });
}

async function getLogins() {
  await axios
    .get(
      "/getLogins?csrf=" + data.value.token + "&email=" + data.value.model.email
    )
    .then((res) => {
      data.value.loginMethodList = res.data.logins;
    });

  console.log("list", data.value.loginMethodList);
  data.value.emailSection = false;
  data.value.loginSection = true;
}
// export default {
//   data() {
//     return {
//       emailSection: true,
//       loginSection: true,
//       token: ''
//     }
//   },
//   setup() {},
//   beforeMount() {
//     this.getCsrf()
//   },
//   methods: {
//     getCsrf: function() {
//       axios.get("/security/csrf")
//           .then(function (response) {
//         self.token = response.data;
//       });
//     },

//     getLogins : function() {
//       axios.get("/getLogins?csrf=" + self.token + "&email=" + this.email)
//           .then(function (response) {
//       });

//       self.emailSection = false;
//       self.loginSection = true;

//       console.log("emailSection: " + self.emailSection + " loginsSection: " + self.emailSection);
//     }
//   }
// };
</script>

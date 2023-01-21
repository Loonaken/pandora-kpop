<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ダッシュボード
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Content --}}
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-12 mx-auto">
                            <div class="flex flex-col text-center w-full mb-10">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Pandora K-popへようこそ！</h1>
                            </div>
                        <div class="flex justify-around">
                            <div class="basis-1/2 border-2 border-gray-300 grow p-4  text-center hover:bg-lime-200 transition-colors duration-300 ease-in-out ">
                                <a href="#">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class=" ml-3 text-indigo-500 w-20 h-20 mb-3 inline-block" viewBox="0 0 100 100">
                                            <path fill="#3805A4" d="M37.4776 90.7492C36.7887 90.3035 36.584 89.6743 36.5946 88.8616C36.633 85.978 36.6074 83.0922 36.6117 80.2086C36.6138 78.2719 37.3923 77.3484 39.3994 76.973C39.2543 76.6893 39.1306 76.4185 38.9834 76.1625C35.7223 70.5339 32.4569 64.9095 29.1957 59.283C28.2167 57.5959 27.4084 55.8426 27.0842 53.8975C26.7173 51.707 27.5107 49.781 29.2064 48.7786C30.9937 47.7228 32.8834 47.8977 34.6878 49.3438C35.6348 50.1031 36.5264 50.9306 37.3731 51.6665C37.3731 51.5961 37.371 51.2698 37.3731 50.9434C37.4051 44.2611 37.4265 37.5789 37.4712 30.8966C37.4862 28.8341 38.8597 27.0531 40.7921 26.4965C42.7352 25.9355 44.8446 26.6202 45.8833 28.3542C46.3589 29.1476 46.6447 30.1501 46.7002 31.0779C46.8196 33.0956 46.7364 35.1261 46.7364 37.2333C48.4107 36.6361 49.9784 36.6852 51.4032 37.7388C52.7853 38.7626 53.4294 40.1682 53.3995 41.9896C54.884 41.4863 56.2874 41.4735 57.6311 42.237C58.9578 42.9942 59.683 44.1694 60.0136 45.6838C60.5553 45.6113 61.0779 45.5046 61.6047 45.479C64.4947 45.3318 66.5935 47.2941 66.6447 50.1799C66.6916 52.9206 66.6511 55.6656 66.7918 58.4021C66.9966 62.3564 66.2479 66.1849 65.5164 70.0262C65.0685 72.3767 64.6419 74.7314 64.1961 77.1372C65.7531 77.8006 66.1434 79.0504 66.1072 80.616C66.0453 83.3268 66.0624 86.042 66.1072 88.755C66.12 89.5911 65.9238 90.2544 65.2434 90.7514C64.9 90.7514 64.5587 90.7514 64.2153 90.7514C63.5285 90.3056 63.3195 89.6785 63.3323 88.8659C63.3707 86.1572 63.3472 83.4484 63.3472 80.7397C63.3472 80.4389 63.3472 80.1361 63.3472 79.8311C55.2871 79.8311 47.3443 79.8311 39.329 79.8311C39.329 80.1851 39.329 80.4944 39.329 80.8015C39.3354 83.4527 39.3183 86.106 39.3674 88.7571C39.3823 89.5911 39.1861 90.2544 38.5078 90.7514C38.1623 90.7492 37.821 90.7492 37.4776 90.7492ZM61.4298 77.0007C61.9609 74.1192 62.5197 71.2697 63.006 68.4074C63.392 66.1338 63.8975 63.8516 63.9786 61.5609C64.1108 57.7686 63.9487 53.9678 63.8975 50.1692C63.8805 48.9257 63.1404 48.207 61.9161 48.1942C60.7494 48.1814 60.0903 48.8724 60.0733 50.1692C60.0477 52.2829 60.0434 54.3966 60.0242 56.5081C60.0221 56.8216 60.0264 57.1437 59.9538 57.4444C59.7811 58.1696 59.2969 58.5855 58.5461 58.5749C57.7719 58.5642 57.3603 58.0822 57.2366 57.3506C57.1939 57.101 57.2174 56.8387 57.2195 56.5806C57.2366 53.3259 57.26 50.069 57.2664 46.8142C57.2664 46.3919 57.2472 45.944 57.115 45.5515C56.8377 44.7325 55.8929 44.2398 55.0461 44.3934C54.0607 44.5725 53.4337 45.3191 53.4294 46.4047C53.4166 49.7746 53.4251 53.1446 53.423 56.5145C53.423 56.7704 53.4379 57.0307 53.4123 57.2845C53.327 58.1056 52.6253 58.7391 51.8639 58.705C51.1365 58.6708 50.6417 58.1163 50.5863 57.2567C50.5692 57.0008 50.582 56.7427 50.5841 56.4868C50.6055 51.6025 50.6332 46.7203 50.6481 41.8361C50.6524 40.5372 49.8782 39.6285 48.7861 39.5859C47.6685 39.5432 46.8282 40.4689 46.7834 41.7955C46.7748 42.0238 46.7791 42.252 46.7791 42.4802C46.7663 47.2216 46.7535 51.9608 46.7386 56.7022C46.7386 56.9581 46.7578 57.2205 46.7215 57.4722C46.6191 58.1888 46.0177 58.7028 45.3032 58.7092C44.5716 58.7156 44.0192 58.2315 43.9232 57.4636C43.8848 57.1544 43.9019 56.8366 43.9019 56.523C43.9317 48.1835 43.9637 39.8461 43.9936 31.5066C43.9936 31.2506 44.0106 30.9904 43.9808 30.7366C43.8699 29.7683 42.9975 29.0218 42.0335 29.0538C41.0971 29.0858 40.3037 29.8365 40.2205 30.7814C40.1949 31.0651 40.2098 31.353 40.2077 31.6367C40.1693 40.0892 40.1245 48.5418 40.0968 56.9965C40.0947 57.7964 39.8793 58.4448 39.0496 58.6388C38.2284 58.8308 37.7059 58.3552 37.3411 57.6641C37.0084 57.0328 36.6906 56.3929 36.3259 55.7829C35.3469 54.1406 34.3914 52.4706 32.7875 51.3274C32.1199 50.8517 31.4096 50.6598 30.6311 51.1141C29.8825 51.5513 29.5881 52.2701 29.7972 53.0145C30.2173 54.5096 30.5906 56.073 31.3414 57.4082C34.9225 63.7727 38.6294 70.0668 42.2702 76.3971C42.5475 76.877 42.8354 77.0605 43.4006 77.0583C49.1402 77.0349 54.8797 77.0434 60.6214 77.0413C60.871 77.037 61.1248 77.0157 61.4298 77.0007Z"/><path fill="#3805A4" d="M52.3881 3.00213C53.9323 3.47136 55.5725 3.74224 57.0036 4.43969C65.6908 8.67557 67.3417 19.9734 60.2947 26.7175C57.6136 29.2834 54.8622 31.7767 52.162 34.3255C51.8165 34.6497 51.5392 34.7051 51.1105 34.5345C50.6136 34.3383 50.0803 34.2359 49.5471 34.0887C49.3146 33.4126 49.5642 32.9434 50.0846 32.4678C52.8637 29.9211 55.6386 27.3702 58.3623 24.7638C61.5125 21.7501 62.6536 18.0474 61.5467 13.835C60.4418 9.63323 57.5945 7.03326 53.3842 6.04787C49.7583 5.19899 46.4801 6.082 43.622 8.44949C42.1802 9.6439 41.9648 9.67802 40.5955 8.47508C36.11 4.53993 29.0523 4.91532 25.0511 9.29837C21.0306 13.7049 21.3249 20.5173 25.7549 24.7254C28.4253 27.2636 31.1255 29.7697 33.8513 32.2459C34.472 32.809 34.809 33.3614 34.7258 34.2189C34.6511 34.9974 34.7109 35.7908 34.7109 36.6439C34.5253 36.565 34.4378 36.5522 34.3845 36.5032C30.6733 33.033 26.8107 29.7057 23.2957 26.0436C19.4608 22.0465 18.4584 17.1409 20.3481 11.9197C22.1994 6.80504 26.0898 3.99392 31.4284 3.14077C31.5627 3.11944 31.6907 3.04905 31.8208 3.00213C32.7913 3.00213 33.7639 3.00213 34.7343 3.00213C35.7794 3.26874 36.8757 3.41804 37.8611 3.82755C39.3456 4.44395 40.7554 5.24378 42.1375 5.93483C43.2743 5.3163 44.4069 4.57619 45.6354 4.06857C46.8064 3.58654 48.0776 3.34766 49.304 3C50.3299 3.00213 51.3601 3.00213 52.3881 3.00213Z"/><path fill="#3805A4" d="M53.0699 13.6113C51.9917 13.9151 50.8742 14.1251 49.8449 14.5507 48.7649 14.997 47.7711 15.6476 46.7699 16.1913 45.5549 15.582 44.3155 14.8807 43.0105 14.3388 42.1442 13.9788 41.1805 13.8476 40.2617 13.6132 44.533 13.6113 48.8024 13.6113 53.0699 13.6113zM18.1143 23.2633C18.5899 24.1378 19.0101 24.9099 19.3748 25.5817 18.5323 26.1256 17.6983 26.6418 16.8879 27.192 16.1328 27.7018 15.5207 27.4885 14.8894 26.9425 13.006 25.313 10.421 25.1829 8.49711 26.5863 5.95473 28.4398 5.70731 32.0187 8.03428 34.2817 10.1821 36.3719 12.4003 38.3875 14.5886 40.435 15.0472 40.8638 15.5079 41.2882 16.0816 41.8214 19.1423 38.5069 22.9921 35.9965 25.6348 32.1147 26.2213 32.6629 26.8953 33.2942 27.6994 34.045 27.0531 34.8512 26.5135 35.6979 25.8075 36.3741 23.0902 38.9826 20.3218 41.5399 17.5661 44.11 16.5359 45.0719 15.5676 45.089 14.546 44.142 11.7434 41.5399 8.93222 38.9442 6.16801 36.3015 3.20119 33.4648 2.86633 29.0839 5.3106 25.8888 7.71648 22.745 12.0206 21.9388 15.5143 24.0098 15.9259 24.2551 16.1968 24.2359 16.585 23.997 17.0564 23.7027 17.5896 23.5086 18.1143 23.2633zM64.791 25.602C65.1579 24.9195 65.5759 24.1474 66.0494 23.2665 66.5293 23.4798 67.0497 23.6334 67.4827 23.9213 67.9775 24.2498 68.3359 24.2135 68.8563 23.9277 71.5224 22.4582 74.229 22.4795 76.8268 24.0621 79.3841 25.6191 80.5594 28.0079 80.4719 30.9747 80.4101 33.0927 79.5377 34.8971 77.9935 36.3496 75.2293 38.9517 72.4544 41.5431 69.6753 44.1282 68.6515 45.0815 67.6789 45.0751 66.6552 44.1196 63.8995 41.5516 61.1396 38.9858 58.4031 36.3944 56.2958 34.4001 56.3449 33.8306 58.7657 31.9814 59.2861 33.8115 60.7706 34.8438 62.0396 36.0467 64.0467 37.9492 66.0772 39.8304 68.1396 41.7564 68.3316 41.5986 68.5086 41.4663 68.6686 41.317 71.1705 38.9794 73.7043 36.6716 76.1635 34.2871 78.9277 31.6082 77.9999 27.1825 74.438 25.9262 72.5952 25.2757 70.8974 25.6148 69.3916 26.8626 68.3721 27.7072 67.9925 27.6794 66.9303 26.8796 66.2798 26.3955 65.5311 26.0371 64.791 25.602z"/><path stroke="#3805A4" stroke-width="3.868" d="M50.7461 83.8965V83.893C50.7461 83.8939 50.7461 83.8949 50.7461 83.8958C50.7461 83.896 50.7461 83.8962 50.7461 83.8965ZM50.7461 83.8965C50.7461 83.8972 50.7461 83.8979 50.7461 83.8986V83.8965ZM50.7461 83.8965C50.7461 83.8972 50.7461 83.8979 50.7461 83.8986C50.7471 84.0821 50.8227 84.2141 50.8985 84.2914C50.9743 84.3689 51.1212 84.4625 51.3385 84.4631C51.3391 84.4631 51.3398 84.4631 51.3404 84.4631C51.3406 84.4631 51.3407 84.4631 51.3409 84.4631C51.5421 84.463 51.6927 84.3767 51.7795 84.2882C51.8664 84.1997 51.9343 84.0652 51.9348 83.8999C51.9348 83.8995 51.9348 83.899 51.9348 83.8986C51.9348 83.8979 51.9348 83.8972 51.9348 83.8964C51.9343 83.733 51.8675 83.5975 51.7793 83.507C51.691 83.4164 51.5419 83.3321 51.3476 83.3299C51.3466 83.3299 51.3456 83.3299 51.3446 83.3299C51.3437 83.3299 51.3427 83.3298 51.3418 83.3298H51.343L50.7461 83.8965Z"/>
                                        </svg>
                                        <h2 class="title-font font-medium text-3xl text-gray-900">あなたが聞きたい曲は？</h2>
                                    </a>
                            </div>
                            <div class="basis-1/2 border-2 border-gray-300 grow p-4  text-center hover:bg-lime-200 transition-colors duration-300 ease-in-out ">
                                <a href="#">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="  text-indigo-500 w-20 h-20 mb-3 inline-block" viewBox="0 0 210 210">
                                            <path fill="#2a7fff" d="m -112.03334,30.143999 c -8.07008,0.01003 -16.1395,0.03096 -24.20886,0.06976 8.06918,-0.0388 16.13896,-0.05971 24.20886,-0.06976 z"/><g transform="translate(262.66 13.686) scale(.7608)"><path fill="#2a7fff" fill-rule="evenodd" d="m -253.17924,44.013444 c 0.24003,0.132808 0.47789,0.26652 0.71572,0.400492 -0.23799,-0.13384 -0.47556,-0.267795 -0.71572,-0.400492 z m 1.08624,0.609264 c 0.32076,0.182369 0.63961,0.365919 0.95652,0.550355 -0.31713,-0.184304 -0.6355,-0.368155 -0.95652,-0.550355 z m 0.99632,0.573093 c 0.34523,0.201102 0.6885,0.403198 1.02938,0.606681 -0.34083,-0.203443 -0.684,-0.405749 -1.02938,-0.606681 z m 1.02938,0.606681 c 1.26863,0.757227 2.5059,1.532036 3.71452,2.324405 -1.20857,-0.792348 -2.44592,-1.567199 -3.71452,-2.324405 z m 3.77497,2.363679 c 1.18872,0.780532 2.34987,1.57801 3.48507,2.393136 -1.1352,-0.815142 -2.29635,-1.612591 -3.48507,-2.393136 z m 3.59667,2.473235 c 0.55115,0.396907 1.09678,0.797844 1.63608,1.203026 -0.53933,-0.405193 -1.0849,-0.806108 -1.63608,-1.203026 z m 1.76011,1.296562 c 0.49872,0.375878 0.99251,0.755399 1.48157,1.138431 -0.48903,-0.38303 -0.98288,-0.762556 -1.48157,-1.138431 z m 1.64537,1.266071 c 0.49035,0.385709 0.97523,0.775412 1.45624,1.168405 -0.48101,-0.392975 -0.96589,-0.782709 -1.45624,-1.168405 z m 1.78027,1.435055 c 0.48467,0.399312 0.96663,0.800851 1.44227,1.207677 -0.47564,-0.406828 -0.9576,-0.808363 -1.44227,-1.207677 z m 18.34822,18.828308 c 0.15923,0.195294 0.31647,0.391843 0.4744,0.588079 -0.15859,-0.195858 -0.31512,-0.392827 -0.4744,-0.588079 z m 1.66862,2.072743 c 0.26504,0.333198 0.52557,0.666689 0.78809,1.000456 -0.26252,-0.333767 -0.52305,-0.667258 -0.78809,-1.000456 z m 1.6392,2.085142 c 0.28282,0.363722 0.56068,0.725865 0.83974,1.088824 -0.2793,-0.363064 -0.55695,-0.725139 -0.83974,-1.088824 z m 1.62161,2.107366 c 0.31501,0.413472 0.62452,0.823598 0.9343,1.234549 -0.30991,-0.411086 -0.6191,-0.820918 -0.9343,-1.234549 z m 1.49757,1.982309 c 0.35457,0.473218 0.70249,0.941109 1.04904,1.4087 -0.34655,-0.467588 -0.69447,-0.935482 -1.04904,-1.4087 z m 1.52548,2.052071 c 0.35401,0.479883 0.70141,0.953659 1.04595,1.425234 -0.34467,-0.471768 -0.6917,-0.945034 -1.04595,-1.425234 z m 1.37874,1.881021 c 0.41545,0.570272 0.82185,1.130461 1.22164,1.684652 -0.39976,-0.554178 -0.80624,-1.114417 -1.22164,-1.684652 z m -36.1239,11.351244 c 0.53083,0.654992 1.06733,1.32606 1.60663,2.005047 -0.53944,-0.679154 -1.07564,-1.349875 -1.60663,-2.005047 z m 26.27283,1.434539 -14.12317,14.123173 c 0.57158,0.72569 1.137,1.43854 1.69447,2.13268 0.54309,0.92078 1.20717,1.97405 1.9575,3.12229 -0.75028,1.14817 -1.41444,2.20105 -1.9575,3.12177 -4.40478,5.48471 -9.30399,12.08837 -13.84413,17.6904 -4.57124,5.64041 -8.88577,10.4092 -14.1087,14.83733 -5.22293,4.42815 -11.35414,8.51545 -17.3152,11.12697 -4.19534,1.83794 -8.30488,2.94348 -12.17293,3.71502 l -29.47003,29.47004 c 0.76308,0.89519 1.76789,1.81502 3.09594,2.75073 2.4978,1.75988 6.08592,3.55378 10.42313,4.35995 1.89754,0.35271 3.92081,0.50776 6.00586,0.52296 2.68076,0.0195 5.46309,-0.19226 8.2093,-0.5116 4.88217,-0.56768 9.76056,-1.4968 16.00729,-3.58686 6.24674,-2.09005 14.08092,-5.38276 20.95014,-9.07283 6.86921,-3.69007 12.85033,-7.83056 18.26193,-12.45919 5.41163,-4.62862 10.40707,-9.85168 15.17582,-15.52876 4.74887,-5.65342 9.27168,-11.75568 13.00956,-16.96434 3.85813,4.34167 7.88075,8.3851 12.16668,12.05094 5.41166,4.62863 11.3922,8.76912 18.26143,12.45919 0.0605,0.0325 0.12232,0.0642 0.18293,0.0966 z m 42.41032,73.456493 c 0.42663,0.22819 0.85658,0.45466 1.28984,0.67955 -0.43321,-0.22487 -0.86325,-0.45138 -1.28984,-0.67955 z m 1.28984,0.67955 c 0.86662,0.44983 1.74499,0.89271 2.63085,1.32705 -0.88562,-0.43428 -1.76443,-0.87731 -2.63085,-1.32705 z m 2.63085,1.32705 c 0.44288,0.21714 0.88738,0.43222 1.33325,0.64492 -0.44579,-0.2127 -0.89044,-0.42778 -1.33325,-0.64492 z m 1.33325,0.64492 c 0.44573,0.21263 0.89248,0.42317 1.33997,0.63097 -0.44756,-0.20787 -0.89417,-0.41827 -1.33997,-0.63097 z m 1.33997,0.63097 c 0.89533,0.41576 1.79256,0.82129 2.6877,1.21543 -0.89494,-0.39414 -1.79256,-0.79968 -2.6877,-1.21543 z m 2.6877,1.21543 c 0.44749,0.19704 0.89434,0.39133 1.33996,0.58239 -0.44559,-0.19109 -0.8925,-0.38532 -1.33996,-0.58239 z m 1.33996,0.58239 c 0.44482,0.19072 0.8884,0.37838 1.33015,0.56276 -0.44181,-0.18445 -0.88526,-0.37197 -1.33015,-0.56276 z m -152.37158,20.80287 c -0.16801,-0.19712 -0.32435,-0.39293 -0.46974,-0.58756 0.14523,0.19474 0.30162,0.39033 0.46974,0.58756 z m -0.46974,-0.58756 c -0.14539,-0.19464 -0.27985,-0.38836 -0.4041,-0.58033 0.12398,0.19209 0.25887,0.38557 0.4041,0.58033 z m -0.4041,-0.58033 c -0.12208,-0.18863 -0.23334,-0.37584 -0.33642,-0.56172 0.10282,0.18583 0.21471,0.37314 0.33642,0.56172 z m 86.09036,-84.04861 c -0.84023,-1.06676 -1.6986,-2.17315 -2.56005,-3.28508 0.8609,1.11127 1.72034,2.21899 2.56005,3.28508 z m -9.92962,-12.775968 c 0.33356,0.422558 0.66746,0.845728 1.00303,1.274338 -0.33552,-0.42854 -0.6695,-0.85184 -1.00303,-1.274338 z m 2.26702,2.900598 c 0.97216,1.25132 1.94236,2.50191 2.91405,3.76153 -0.97216,-1.26015 -1.94141,-2.50969 -2.91405,-3.76153 z m -49.09777,65.81665 c -0.52361,0.098 -1.04288,0.19081 -1.55649,0.27854 0.51424,-0.088 1.03227,-0.18031 1.55649,-0.27854 z m 125.29674,9.0563 c 0.41871,0.17458 0.83573,0.34667 1.25058,0.51521 -0.41485,-0.16857 -0.83187,-0.34059 -1.25058,-0.51521 z m 1.70119,0.69556 c 0.28782,0.11582 0.57611,0.23251 0.86145,0.3452 -0.28529,-0.11269 -0.57368,-0.22938 -0.86145,-0.3452 z m 1.15032,0.45786 c 0.34023,0.1335 0.67999,0.26651 1.01596,0.39532 -0.33595,-0.12882 -0.67575,-0.2618 -1.01596,-0.39532 z"/><path fill="#59f" fill-rule="evenodd" d="M-299.4963 30.214286c-2.08503.01521-4.10832.170256-6.00586.522965-4.33721.806172-7.92533 2.60007-10.42313 4.359941-2.4978 1.759879-3.8608 3.463473-4.59869 5.052923-.7379 1.589439-.85112 3.065536-.85112 5.109247.00006 2.043721.11343 4.655298 1.02167 7.096207.90826 2.440916 2.61143 4.71198 4.71186 6.755661 2.10044 2.043679 4.59867 3.860141 8.11836 4.995561 3.5197 1.13542 8.06133 1.58954 13.22761 2.384351 5.16625.794798 10.95626 1.930342 16.91733 4.54184 5.96108 2.61152 12.09227 6.698829 17.3152 11.12697 5.22293 4.428141 9.53746 9.196927 14.1087 14.837336 3.96554 4.893042 8.20496 10.549432 12.14966 15.557712l25.20776-25.207767c-3.59506-4.984282-7.84109-10.671609-12.29487-15.973703-4.76875-5.67708-9.76419-10.900143-15.17582-15.528769-5.41162-4.628628-11.39272-8.769117-18.26193-12.459186-6.86922-3.69007-14.7034-6.98278-20.95014-9.07283-6.24673-2.09006-11.12512-3.019176-16.00729-3.586864-2.74621-.319328-5.52854-.531085-8.2093-.511595zM-289.5512 168.30146c-1.62801.32473-3.21408.59139-4.7444.82683-5.16628.7948-9.70791 1.24893-13.22761 2.38435-3.51969 1.13542-6.01794 2.95189-8.11836 4.99556-2.10045 2.04369-3.8036 4.31475-4.71186 6.75566-.90824 2.4409-1.02159 5.05249-1.02167 7.0962 0 2.04371.11322 3.51981.85112 5.10925.34557.74435.83066 1.51371 1.50275 2.30219z"/><path fill="#06f" fill-rule="evenodd" d="m -136.2422,30.21377 c -2.55199,-0.0358 -4.12735,1.939893 -4.22351,3.88865 v 17.062524 c -0.0101,0.0013 -0.0204,0.0019 -0.0305,0.0031 -4.88217,0.56768 -9.76057,1.496801 -16.00729,3.586861 -6.24674,2.09005 -14.08144,5.382758 -20.95066,9.072832 -6.86923,3.69007 -12.84976,7.830558 -18.26143,12.459187 -4.28593,3.665837 -8.30855,7.70927 -12.16668,12.050945 -0.23228,-0.323678 -0.47649,-0.660379 -0.71469,-0.990637 l -11.08459,11.084595 42.41032,73.456493 c 6.82541,3.6506 14.57597,6.90454 20.76773,8.97619 6.24672,2.09006 11.12512,3.0192 16.00729,3.58688 0.0101,0.001 0.0203,0.002 0.0305,0.003 V 201.517 c 0.15386,3.11801 4.09483,6.30608 9.76322,1.21129 l 15.94993,-15.94993 17.148311,-17.14831 c 2.368841,-2.36883 2.368841,-6.18311 0,-8.55193 l -17.064591,-17.06407 -16.03365,-16.03417 c -1.60014,-1.63607 -3.39076,-2.33907 -4.99711,-2.34301 -2.67724,-0.007 -4.84347,1.92992 -4.76611,4.72943 v 17.82217 c -4.37391,-0.78188 -9.09688,-1.92229 -13.9392,-4.04368 -5.96109,-2.61151 -12.09229,-6.69883 -17.31523,-11.12697 -5.22293,-4.42814 -9.53746,-9.19694 -14.1087,-14.83734 -0.0981,-0.12106 -0.1987,-0.24854 -0.29714,-0.37052 0.0985,-0.12208 0.19895,-0.24987 0.29714,-0.37104 4.57124,-5.6404 8.88577,-10.40919 14.1087,-14.83733 5.22294,-4.428158 11.35413,-8.515462 17.31523,-11.126971 4.84232,-2.1214 9.56529,-3.261813 13.9392,-4.043683 v 17.822174 c -0.0774,2.7995 2.08887,4.73642 4.76611,4.72942 1.60635,-0.004 3.39697,-0.70694 4.99711,-2.34301 l 16.03365,-16.03416 17.064591,-17.064074 c 2.368841,-2.36882 2.368841,-6.183104 0,-8.551934 l -17.148311,-17.148307 -15.94993,-15.94993 c -2.12564,-1.910546 -4.00852,-2.65588 -5.53971,-2.677356 z m -106.563,20.347077 c 0.033,0.02368 0.0663,0.04708 0.0992,0.0708 -0.0329,-0.02371 -0.0662,-0.04712 -0.0992,-0.0708 z m 1.74562,1.281575 c 0.0387,0.02906 0.0772,0.05823 0.11575,0.08733 -0.0386,-0.0291 -0.077,-0.05827 -0.11575,-0.08733 z m 1.62576,1.247471 c 0.0478,0.03744 0.096,0.07463 0.14364,0.112136 -0.0477,-0.0375 -0.0959,-0.07471 -0.14364,-0.112136 z m 1.61851,1.295527 c 0.10178,0.08321 0.20296,0.167087 0.30435,0.250632 -0.10139,-0.08353 -0.20254,-0.167431 -0.30435,-0.250632 z m 18.64431,19.068087 c 0.19577,0.239924 0.38828,0.482155 0.58293,0.722953 -0.19473,-0.240872 -0.38711,-0.482981 -0.58293,-0.722953 z m 1.67793,2.084628 c 0.26493,0.333113 0.52571,0.666806 0.78809,1.000456 -0.26252,-0.333767 -0.52305,-0.667258 -0.78809,-1.000456 z m 1.6392,2.085142 c 0.29631,0.381124 0.58812,0.761129 0.88056,1.141534 -0.29268,-0.380656 -0.58401,-0.760177 -0.88056,-1.141534 z m 1.60454,2.084628 c 0.32494,0.426408 0.64498,0.85063 0.96428,1.274342 -0.31975,-0.424199 -0.63889,-0.847437 -0.96428,-1.274342 z m 1.51464,2.005047 c 0.35401,0.472567 0.70299,0.941707 1.04904,1.4087 -0.34655,-0.467588 -0.69447,-0.935482 -1.04904,-1.4087 z m 1.50275,2.021064 c 0.36126,0.489718 0.71726,0.975183 1.06868,1.456241 -0.35203,-0.481833 -0.70668,-0.965632 -1.06868,-1.456241 z m 1.40147,1.912028 c 0.41574,0.570764 0.82656,1.137025 1.2268,1.691886 -0.40143,-0.556506 -0.80958,-1.119177 -1.2268,-1.691886 z"/></g></svg>
                                    <h2 class="title-font font-medium text-3xl text-gray-900">曲をランダムに再生</h2>
                                </a>
                            </div>
                        </div>
                        <div class="flex justify-around mb-4">
                            <div class="basis-1/2 border-2 border-gray-300 p-4   text-center hover:bg-lime-200 transition-colors duration-300 ease-in-out ">
                                <a href="#">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class=" ml-3 text-indigo-500 w-20 h-20 mb-3 inline-block" viewBox="0 0 30 30">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                        </svg>
                                        <h2 class="title-font font-medium text-3xl text-gray-900">ハッシュタグ集</h2>
                                    </a>
                            </div>
                            <div class="basis-1/2 border-2 border-gray-300 grow shrink-0 p-4  text-center hover:bg-lime-200 transition-colors duration-300 ease-in-out ">
                                <a href="#">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class=" ml-3 text-indigo-500 w-20 h-20 mb-3 inline-block" viewBox="0 0 25 25">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                    </svg>
                                    <h2 class="title-font font-medium text-3xl text-gray-900">コメント</h2>
                                </a>
                            </div>
                        </div>
                        </div>
                    </section>
                    {{-- fin Content --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

bitpay/commerce-seo-plugin
==========================

# Installation

+ Copy the callback, includes, and lang folders into your site directory (it should merge the folders into the existing commerceSEO folders).

# Configuration

+ Create an API key at bitpay.com under My Account > API Access Keys

+ In your commerceSEO admin panel under Modules > Payment, install the "Bitcoin via BitPay" module

+ Fill out all of the configuration information:

	+ Verify that the module is enabled.

	+ Copy/Paste the bitpay.com API key you created into the API Key field

    + Select a transaction speed. The **high** speed will send a confirmation as soon as a transaction is received in the bitcoin network (usually a few seconds). A **medium** speed setting will typically take 10 minutes. The **low** speed setting usually takes around 1 hour. See the bitpay.com merchant documentation for a full description of the transaction speed settings: https://bitpay.com/downloads/bitpayApi.pdf
	
	+ Choose a status for unpaid and paid orders (or leave the default values as defined).

	+ Verify that the currencies displayed corresponds to what you want and to those accepted by bitpay.com (the defaults are what BitPay accepts as of this writing).

    + Choose a sort order for displaying this payment option to visitors. Lowest is displayed first.

    + Line 108 in bitpay.php sets fullNotifications to true. You can set this to false if you want fewer status update emails.

# Usage

+ When a user chooses the "Bitcoin via BitPay" payment method, they will be presented with an order summary as the next step (prices are shown in whatever currency they've selected for shopping). Upon confirming their order, the system takes the user to bitpay.com. Once payment is received, a link is presented to the shopper that will take them back to your website.

+ In your Admin control panel, you can see the orders made via Bitcoins just as you could see for any other payment mode. The status you selected in the configuration steps above will indicate whether the order has been paid for.

**Note:** This extension does not provide a means of automatically pulling a current BTC exchange rate for presenting BTC prices to shoppers.

# Support

## BitPay Support

* [GitHub Issues](https://github.com/bitpay/commerce-seo-plugin/issues)
  * Open an issue if you are having issues with this plugin.
* [Support](https://support.bitpay.com)
  * BitPay merchant support documentation

## Commerce:SEO Support

* [Homepage](http://www.commerce-seo.de)
* [Support Forums](http://www.commerce-seo.de/support/)

# Contribute

To contribute to this project, please fork and submit a pull request.

# License

The MIT License (MIT)

Copyright (c) 2011-2015 BitPay

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

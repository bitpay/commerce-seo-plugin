commerceSEO v2 CE BitPay Module
===============================

<strong>©2013-2014 BITPAY, INC.</strong>

Permission is hereby granted to any person obtaining a copy of this software and associated documentation for use and/or modification in association with the bitpay.com service.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Bitcoin payment module for commerceSEO using the bitpay.com service.

Installation
============

+ Copy the callback, includes, and lang folders into your site directory (it should merge the folders into the existing commerceSEO folders).

Configuration
=============

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

Usage
=====

+ When a user chooses the "Bitcoin via BitPay" payment method, they will be presented with an order summary as the next step (prices are shown in whatever currency they've selected for shopping). Upon confirming their order, the system takes the user to bitpay.com. Once payment is received, a link is presented to the shopper that will take them back to your website.

+ In your Admin control panel, you can see the orders made via Bitcoins just as you could see for any other payment mode. The status you selected in the configuration steps above will indicate whether the order has been paid for.

**Note:** This extension does not provide a means of automatically pulling a current BTC exchange rate for presenting BTC prices to shoppers.

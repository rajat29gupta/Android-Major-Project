package com.localservices.models;

import com.localservices.others.Utils.HtmlText;

/**
 * Created by wscube on 5/6/17.
 */

public class RetailFoodModel {
    String id;
    String rfImgUrl;
    String rfName;
    String rfPrice;


    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getRfImgUrl() {
        return rfImgUrl;
    }

    public void setRfImgUrl(String rfImgUrl) {
        this.rfImgUrl = rfImgUrl;
    }

    public String getRfName() {
        return rfName;
    }

    public void setRfName(String rfName) {
        this.rfName = HtmlText.fromHtml(rfName).toString();
    }

    public String getRfPrice() {
        return rfPrice;
    }

    public void setRfPrice(String rfPrice) {
        this.rfPrice = rfPrice;
    }
}

package com.localservices.models;

import com.localservices.others.Utils.HtmlText;

import java.io.Serializable;

/**
 * Created by wscube on 5/6/17.
 */

public class HealthTipModel implements Serializable{
    String healthTipImage;
    String healthTipName,healthTipDescription;
    String id;
    public String getHealthTipImage() {
        return healthTipImage;
    }

    public void setHealthTipImage(String healthTipImage) {
        this.healthTipImage = healthTipImage;
    }

    public String getHealthTipName() {
        return healthTipName;
    }

    public void setHealthTipName(String healthTipName) {
        this.healthTipName = HtmlText.fromHtml(healthTipName).toString();
    }

    public String getHealthTipDescription() {
        return healthTipDescription;
    }

    public void setHealthTipDescription(String healthTipDescription) {
        this.healthTipDescription = HtmlText.fromHtml(healthTipDescription).toString();
    }


    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }
}

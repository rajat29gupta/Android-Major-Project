package com.localservices.others.custom_view;

import android.content.Context;
import android.graphics.Typeface;
import android.util.AttributeSet;
import android.widget.TextView;

import com.localservices.others.custom.CustomFont;


/**
 * Created by wscubetech on 25/5/16.
 */
public class MyTextViewRegular extends TextView {
    public MyTextViewRegular(Context context) {
        super(context);
        init();
    }

    public MyTextViewRegular(Context context, AttributeSet attrs) {
        super(context, attrs);
        init();
    }

    public MyTextViewRegular(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        init();
    }

    public void init() {
        Typeface tf = CustomFont.setFontRegular(getContext().getAssets());
        setTypeface(tf, 1);
    }
}

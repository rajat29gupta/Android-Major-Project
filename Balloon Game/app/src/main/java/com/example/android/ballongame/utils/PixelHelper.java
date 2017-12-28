package com.example.android.ballongame.utils;

import android.content.Context;
import android.util.TypedValue;

/**
 * Created by Rajat on 09-Oct-17.
 */

public class PixelHelper {
    public static int pixelsToDp(int px, Context context) {
        return (int) TypedValue.applyDimension(
                TypedValue.COMPLEX_UNIT_DIP, px,
                context.getResources().getDisplayMetrics());
    }
}

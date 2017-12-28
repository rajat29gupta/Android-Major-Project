package com.localservices.others;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;

/**
 * Created by wscube on 31/5/17.
 */

public class IntentPassing {

    public static void startActivity(Class<?> cls, AppCompatActivity activity) {
        final Intent intent = new Intent(activity, cls);
        activity.startActivity(intent);
    }
}

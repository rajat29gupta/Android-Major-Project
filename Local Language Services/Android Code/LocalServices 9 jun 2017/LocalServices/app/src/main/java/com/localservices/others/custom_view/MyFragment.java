package com.localservices.others.custom_view;

import android.support.v4.app.Fragment;
import android.view.View;

/**
 * Created by wscube on 22/9/16.
 */

public class MyFragment extends Fragment implements View.OnClickListener {

    @Override
    public void onClick(View view) {
        view.setSoundEffectsEnabled(false);
    }


}
